<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TuitionsController extends BaseController
{
    const EDITABLE_TYPES = ['late_pickup', 'absence_deduction', 'adjustment'];

    public function adminIndex(Request $request)
    {
        $school_id = $this->app['school']->id;
        $year = (int) $request->get('year', now()->year);
        $month = (int) $request->get('month', now()->month);
        $class_id = $request->get('class_id');
        $status = $request->get('status');

        if ($year > now()->year || ($year == now()->year && $month > now()->month)) {
            $year = now()->year;
            $month = now()->month;
        }

        $query = DB::table('students as s')
            ->leftJoin('class_student as cs', 'cs.student_id', 's.id')
            ->leftJoin('classes as c', 'c.id', 'cs.class_id')
            ->leftJoin('student_tuitions as t', function ($join) use ($year, $month) {
                $join->on('t.student_id', 's.id')
                    ->where('t.year', $year)
                    ->where('t.month', $month);
            })
            ->leftJoin('student_tuitions_fees as f', 'f.tuition_id', 't.id')
            ->where('s.school_id', $school_id)
            ->whereNull('s.deleted_at');

        if ($class_id) {
            $query->where('c.id', $class_id);
        }

        if ($status === 'none') {
            $query->whereNull('t.id');
        } elseif ($status) {
            $query->where('t.status', $status);
        }

        $students = $query
            ->groupBy('s.id', 's.name', 'c.id', 'c.name', 't.id', 't.status')
            ->orderBy('s.name')
            ->select('s.id as student_id', 's.name as student_name', 'c.id as class_id', 'c.name as class_name', 't.id as tuition_id', 't.status')
            ->selectRaw('COALESCE(SUM(f.amount), 0) as total')
            ->get();

        $data['classes'] = DB::table('classes')
            ->where('school_id', $school_id)
            ->whereNull('deleted_at')
            ->orderBy('name')
            ->get();
        $data['students'] = $students;
        $data['paid_count'] = $students->where('status', 'paid')->count();
        $data['paid_amount'] = $students->where('status', 'paid')->sum('total');
        $data['total_amount'] = $students->sum('total');
        $data['year'] = $year;
        $data['month'] = $month;
        $data['class_id'] = $class_id;
        $data['status'] = $status;

        if ($request->ajax()) {
            return view('admin.tuitions._table', $data);
        }

        return view('admin.tuitions.all', $data);
    }

    /**
     * Apply a status change to a batch of tuition headers at once, e.g. from
     * the checkboxes on the all-students tuitions list.
     */
    public function bulkUpdateStatus(Request $request)
    {
        $school_id = $this->app['school']->id;

        $validator = Validator::make($request->all(), [
            'ids' => 'required|array|min:1',
            'ids.*' => 'integer',
            'status' => 'required|in:paid,unpaid,published',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Vui lòng chọn ít nhất một học phí.');
        }

        $status = $request->get('status');

        $update = [
            'status' => $status,
            'updated_at' => now(),
        ];

        if ($status === 'paid') {
            $update['paid_at'] = now();
            $update['paid_by'] = Auth::id();
        } elseif ($status === 'unpaid') {
            $update['paid_at'] = null;
            $update['paid_by'] = null;
        }

        DB::table('student_tuitions')
            ->whereIn('id', $request->get('ids'))
            ->where('school_id', $school_id)
            ->update($update);

        return back()->with('success', 'Cập nhật trạng thái hàng loạt thành công!');
    }

    public function index($student_id)
    {
        $student = $this->findStudent($student_id);

        $months = DB::table('student_tuitions as t')
            ->leftJoin('student_tuitions_fees as f', 'f.tuition_id', 't.id')
            ->where('t.student_id', $student_id)
            ->where('t.school_id', $this->app['school']->id)
            ->groupBy('t.id', 't.year', 't.month', 't.status')
            ->orderBy('t.year', 'desc')
            ->orderBy('t.month', 'desc')
            ->selectRaw('t.id, t.year, t.month, t.status, COALESCE(SUM(f.amount), 0) as total')
            ->get();

        $data['student'] = $student;
        $data['months'] = $months;
        return view('admin.tuitions.index', $data);
    }

    public function show($student_id, $year, $month)
    {
        $student = $this->findStudent($student_id);
        $tuition = $this->findOrCreateTuition($student_id, $year, $month);
        $this->findOrCreateClassFeeLine($tuition);

        $lines = DB::table('student_tuitions_fees')
            ->where('tuition_id', $tuition->id)
            ->orderBy('created_at')
            ->get();

        $data['student'] = $student;
        $data['tuition'] = $tuition;
        $data['lines'] = $lines;
        $data['total'] = $lines->sum('amount');
        return view('admin.tuitions.show', $data);
    }

    public function create($student_id, $year, $month)
    {
        $data['student'] = $this->findStudent($student_id);
        $data['year'] = $year;
        $data['month'] = $month;
        return view('admin.tuitions.create', $data);
    }

    public function store($student_id, $year, $month, Request $request)
    {
        $this->findStudent($student_id);

        $validator = Validator::make($request->all(), [
            'type' => 'required|in:' . implode(',', self::EDITABLE_TYPES),
            'amount' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $tuition = $this->findOrCreateTuition($student_id, $year, $month);
        $amount = $request->get('amount');

        DB::table('student_tuitions_fees')->insertGetId([
            'tuition_id' => $tuition->id,
            'class_id' => null,
            'type' => $request->get('type'),
            'amount' => $amount,
            'original_amount' => $amount,
            'note' => $request->get('note'),
            'adjusted_by' => Auth::id(),
            'adjusted_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('tuitions.show', [$student_id, $year, $month])
            ->with('success', 'Đã thêm khoản phí!');
    }

    public function edit($fee_id)
    {
        $data['fee'] = $this->findFee($fee_id);
        $data['student'] = $this->findStudent($data['fee']->student_id);
        return view('admin.tuitions.edit', $data);
    }

    public function update($fee_id, Request $request)
    {
        $fee = $this->findFee($fee_id);

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::table('student_tuitions_fees')
            ->where('id', $fee->id)
            ->update([
                'amount' => $request->get('amount'),
                'note' => $request->get('note'),
                'adjusted_by' => Auth::id(),
                'adjusted_at' => now(),
                'updated_at' => now(),
            ]);

        return redirect()->route('tuitions.show', [$fee->student_id, $fee->year, $fee->month])
            ->with('success', 'Cập nhật khoản phí thành công!');
    }

    public function destroy($fee_id)
    {
        $fee = $this->findFee($fee_id);

        if ($fee->type === 'class_fee') {
            abort(422, 'Không thể xoá học phí lớp mặc định.');
        }

        DB::table('student_tuitions_fees')->where('id', $fee->id)->delete();

        return redirect()->route('tuitions.show', [$fee->student_id, $fee->year, $fee->month])
            ->with('success', 'Đã xoá khoản phí!');
    }

    /**
     * Mark a month's tuition as paid or unpaid. This is the only place
     * payment status lives now — per month, not per fee line.
     */
    public function updateStatus($tuition_id, Request $request)
    {
        $tuition = $this->findTuitionHeader($tuition_id);

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:unpaid,paid',
            'note' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $status = $request->get('status');

        DB::table('student_tuitions')
            ->where('id', $tuition->id)
            ->update([
                'status' => $status,
                'paid_at' => $status === 'paid' ? now() : null,
                'paid_by' => $status === 'paid' ? Auth::id() : null,
                'note' => $request->get('note'),
                'updated_at' => now(),
            ]);

        return redirect()->route('tuitions.show', [$tuition->student_id, $tuition->year, $tuition->month])
            ->with('success', 'Cập nhật trạng thái thanh toán thành công!');
    }

    private function findStudent($student_id)
    {
        $student = DB::table('students')
            ->where('id', $student_id)
            ->where('school_id', $this->app['school']->id)
            ->first();

        if (!$student) {
            abort(404);
        }

        return $student;
    }

    private function findTuitionHeader($tuition_id)
    {
        $tuition = DB::table('student_tuitions')
            ->where('id', $tuition_id)
            ->where('school_id', $this->app['school']->id)
            ->first();

        if (!$tuition) {
            abort(404);
        }

        return $tuition;
    }

    /**
     * A fee line together with its parent month's student_id/year/month, so
     * callers can scope it to the current school and redirect back to the
     * month it belongs to.
     */
    private function findFee($fee_id)
    {
        $fee = DB::table('student_tuitions_fees as f')
            ->join('student_tuitions as t', 't.id', 'f.tuition_id')
            ->where('f.id', $fee_id)
            ->where('t.school_id', $this->app['school']->id)
            ->select('f.*', 't.student_id', 't.year', 't.month')
            ->first();

        if (!$fee) {
            abort(404);
        }

        return $fee;
    }

    private function findOrCreateTuition($student_id, $year, $month)
    {
        $school_id = $this->app['school']->id;

        $tuition = DB::table('student_tuitions')
            ->where('student_id', $student_id)
            ->where('school_id', $school_id)
            ->where('year', $year)
            ->where('month', $month)
            ->first();

        if ($tuition) {
            return $tuition;
        }

        $id = DB::table('student_tuitions')->insertGetId([
            'school_id' => $school_id,
            'student_id' => $student_id,
            'year' => $year,
            'month' => $month,
            'status' => 'unpaid',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return DB::table('student_tuitions')->where('id', $id)->first();
    }

    /**
     * Ensure the auto-computed class fee line for a month's tuition exists,
     * seeded from the fee of the student's current class.
     */
    private function findOrCreateClassFeeLine($tuition)
    {
        $existing = DB::table('student_tuitions_fees')
            ->where('tuition_id', $tuition->id)
            ->where('type', 'class_fee')
            ->first();

        if ($existing) {
            return $existing;
        }

        $class = DB::table('class_student')
            ->join('classes', 'classes.id', 'class_student.class_id')
            ->where('class_student.student_id', $tuition->student_id)
            ->orderBy('class_student.class_id')
            ->select('classes.id as class_id', 'classes.tuition')
            ->first();

        $student = DB::table('students')
            ->where('id', $tuition->student_id)
            ->select('tuition_discount', 'tuition_discount_reason')
            ->first();

        $amount = $class->tuition ?? 0;
        $discount = $student->tuition_discount ?? 0;
        $note = null;
        if ($discount > 0) {
            $amount -= round($amount * $discount / 100);
            $note = "Giảm {$discount}%" . ($student->tuition_discount_reason ? " ({$student->tuition_discount_reason})" : '');
        }

        $id = DB::table('student_tuitions_fees')->insertGetId([
            'tuition_id' => $tuition->id,
            'class_id' => $class->class_id ?? null,
            'type' => 'class_fee',
            'amount' => $amount,
            'original_amount' => $amount,
            'note' => $note,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return DB::table('student_tuitions_fees')->where('id', $id)->first();
    }
}
