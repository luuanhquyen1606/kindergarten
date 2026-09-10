<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AttendancesController extends BaseController
{
    private const STATUSES = ['unmarked', 'present', 'absent', 'late', 'excused'];

    public function index()
    {
        $classes = DB::table('classes')
        ->where('school_id', $this->app['school']->id)
        ->where('teacher_id', Auth::id())
        ->whereNull('deleted_at')
        ->orderBy('name')
        ->get();

        $data['classes'] = $classes;

        return view('admin.attendances.index', $data);
    }

    public function show($class_id, Request $request)
    {
        $class = $this->authorizedClass($class_id);
        if (!$class) {
            abort(403);
        }

        $date = $request->get('date', now()->format('Y-m-d'));

        $students = DB::table('class_student')
        ->join('students', 'students.id', 'class_student.student_id')
        ->leftJoin('files', 'files.id', 'students.photo_id')
        ->leftJoin('student_attendances', function ($join) use ($class, $date) {
            $join->on('student_attendances.student_id', 'students.id')
                ->where('student_attendances.class_id', $class->id)
                ->where('student_attendances.date', $date);
        })
        ->select('students.id', 'students.name', 'files.id as file_id',
            'student_attendances.status', 'student_attendances.note')
        ->where('class_student.class_id', $class->id)
        ->whereNull('students.deleted_at')
        ->orderBy('students.name')
        ->get();
        $students->each(fn($student) => $student->thumbnail_path = getThumbnailUrl($student->file_id));

        $data['class'] = $class;
        $data['date'] = $date;
        $data['students'] = $students;

        return view('admin.attendances.show', $data);
    }

    public function update($class_id, Request $request)
    {
        $class = $this->authorizedClass($class_id);
        if (!$class) {
            return response()->json(['message' => 'Không có quyền truy cập.'], 403);
        }

        $validator = Validator::make($request->all(), [
            'date' => 'required|date|before_or_equal:today',
            'updates' => 'required|array|min:1',
            'updates.*.student_id' => 'required|integer',
            'updates.*.status' => ['required', Rule::in(self::STATUSES)],
            'updates.*.note' => 'nullable|string|max:256',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Không thể điểm danh cho ngày trong tương lai hoặc dữ liệu không hợp lệ.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $date = $request->get('date');

        $studentIds = DB::table('class_student')
        ->where('class_id', $class->id)
        ->pluck('student_id');

        $saved = [];
        foreach ($request->get('updates') as $update) {
            $studentId = (int) $update['student_id'];
            if (!$studentIds->contains($studentId)) {
                continue;
            }

            $this->saveAttendance($class, $date, $studentId, $update['status'], $update['note'] ?? null);
            $saved[] = $studentId;
        }

        return response()->json(['status' => 'ok', 'saved' => $saved]);
    }

    private function saveAttendance($class, $date, $studentId, $status, $note)
    {
        $existing = DB::table('student_attendances')
        ->where('class_id', $class->id)
        ->where('student_id', $studentId)
        ->where('date', $date)
        ->first();

        if ($existing) {
            DB::table('student_attendances')
            ->where('id', $existing->id)
            ->update([
                'status' => $status,
                'note' => $note,
                'updated_at' => now(),
            ]);
        } else {
            DB::table('student_attendances')->insert([
                'school_id' => $this->app['school']->id,
                'class_id' => $class->id,
                'student_id' => $studentId,
                'date' => $date,
                'status' => $status,
                'note' => $note,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function authorizedClass($class_id)
    {
        return DB::table('classes')
        ->where('id', $class_id)
        ->where('school_id', $this->app['school']->id)
        ->where('teacher_id', Auth::id())
        ->whereNull('deleted_at')
        ->first();
    }
}
