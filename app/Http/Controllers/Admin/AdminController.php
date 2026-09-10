<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends BaseController
{
    public function index()
    {
        $school_id = $this->app['school']->id;
        $today = now();

        $data['stats'] = $this->buildStats($school_id);
        $data['tuition'] = $this->buildTuitionSummary($school_id, $today);
        $data['tuitionTrend'] = $this->buildTuitionTrend($school_id, $today);
        $data['attendance'] = $this->buildAttendanceToday($school_id, $today);
        $data['recentStudents'] = $this->buildRecentStudents($school_id);
        $data['birthdays'] = $this->buildUpcomingBirthdays($school_id, $today);
        $data['classes'] = $this->buildClassesOverview($school_id);
        $data['today'] = $today;

        return view('admin.index', $data);
    }

    private function buildStats($school_id)
    {
        return [
            'students' => DB::table('students')->where('school_id', $school_id)->whereNull('deleted_at')->count(),
            'classes' => DB::table('classes')->where('school_id', $school_id)->whereNull('deleted_at')->count(),
            'teachers' => DB::table('users')->where('school_id', $school_id)->whereNull('deleted_at')->count(),
        ];
    }

    private function buildTuitionSummary($school_id, Carbon $today)
    {
        $year = $today->year;
        $month = $today->month;

        $rows = DB::table('students as s')
            ->leftJoin('class_student as cs', 'cs.student_id', 's.id')
            ->leftJoin('classes as c', 'c.id', 'cs.class_id')
            ->leftJoin('student_tuitions as t', function ($join) use ($year, $month) {
                $join->on('t.student_id', 's.id')
                    ->where('t.year', $year)
                    ->where('t.month', $month);
            })
            ->leftJoin('student_tuitions_fees as f', 'f.tuition_id', 't.id')
            ->where('s.school_id', $school_id)
            ->whereNull('s.deleted_at')
            ->groupBy('s.id', 's.name', 'c.id', 'c.name', 't.id', 't.status')
            ->select('s.id as student_id', 's.name as student_name', 'c.name as class_name', 't.id as tuition_id', 't.status')
            ->selectRaw('COALESCE(SUM(f.amount), 0) as total')
            ->get();

        $paid = $rows->where('status', 'paid');
        $unpaid = $rows->reject(fn ($r) => $r->status === 'paid');
        $totalAmount = $rows->sum('total');
        $paidAmount = $paid->sum('total');

        return [
            'year' => $year,
            'month' => $month,
            'total_students' => $rows->count(),
            'paid_count' => $paid->count(),
            'paid_amount' => $paidAmount,
            'total_amount' => $totalAmount,
            'unpaid_amount' => $totalAmount - $paidAmount,
            'collection_rate' => $totalAmount > 0 ? round($paidAmount / $totalAmount * 100) : 0,
            'top_unpaid' => $unpaid->sortByDesc('total')->take(5)->values(),
        ];
    }

    private function buildTuitionTrend($school_id, Carbon $today)
    {
        $months = collect(range(5, 0))->map(fn ($i) => $today->copy()->subMonths($i));

        return $months->map(function ($date) use ($school_id) {
            $totals = DB::table('student_tuitions as t')
                ->leftJoin('student_tuitions_fees as f', 'f.tuition_id', 't.id')
                ->where('t.school_id', $school_id)
                ->where('t.year', $date->year)
                ->where('t.month', $date->month)
                ->selectRaw('COALESCE(SUM(f.amount), 0) as total')
                ->selectRaw("COALESCE(SUM(CASE WHEN t.status = 'paid' THEN f.amount ELSE 0 END), 0) as paid")
                ->first();

            return [
                'label' => 'Th' . $date->month . '/' . $date->format('y'),
                'total' => (float) $totals->total,
                'paid' => (float) $totals->paid,
            ];
        })->values();
    }

    private function buildAttendanceToday($school_id, Carbon $today)
    {
        $date = $today->toDateString();

        $classes = DB::table('classes')
            ->where('school_id', $school_id)
            ->whereNull('deleted_at')
            ->orderBy('name')
            ->get(['id', 'name']);

        $enrollCounts = DB::table('class_student')
            ->whereIn('class_id', $classes->pluck('id'))
            ->select('class_id', DB::raw('count(*) as cnt'))
            ->groupBy('class_id')
            ->pluck('cnt', 'class_id');

        $statusCounts = DB::table('student_attendances')
            ->where('school_id', $school_id)
            ->where('date', $date)
            ->select('class_id', 'status', DB::raw('count(*) as cnt'))
            ->groupBy('class_id', 'status')
            ->get()
            ->groupBy('class_id');

        $rows = $classes->map(function ($class) use ($enrollCounts, $statusCounts) {
            $total = (int) ($enrollCounts[$class->id] ?? 0);
            $byStatus = collect($statusCounts[$class->id] ?? []);
            $present = (int) optional($byStatus->firstWhere('status', 'present'))->cnt;
            $absent = (int) optional($byStatus->firstWhere('status', 'absent'))->cnt;
            $late = (int) optional($byStatus->firstWhere('status', 'late'))->cnt;
            $excused = (int) optional($byStatus->firstWhere('status', 'excused'))->cnt;
            $marked = $present + $absent + $late + $excused;

            return [
                'id' => $class->id,
                'name' => $class->name,
                'total' => $total,
                'present' => $present,
                'absent' => $absent,
                'late' => $late,
                'excused' => $excused,
                'marked' => $marked,
                'unmarked' => max($total - $marked, 0),
            ];
        });

        return [
            'date' => $date,
            'classes' => $rows,
            'total_students' => $rows->sum('total'),
            'total_present' => $rows->sum('present'),
            'total_absent' => $rows->sum('absent'),
            'total_late' => $rows->sum('late'),
            'total_excused' => $rows->sum('excused'),
            'total_marked' => $rows->sum('marked'),
        ];
    }

    private function buildRecentStudents($school_id)
    {
        $students = DB::table('students as s')
            ->where('s.school_id', $school_id)
            ->whereNull('s.deleted_at')
            ->orderBy('s.created_at', 'desc')
            ->select(
                's.id', 's.name', 's.created_at', 's.photo_id',
                DB::raw('(SELECT classes.name FROM class_student
                            INNER JOIN classes ON classes.id = class_student.class_id
                            WHERE class_student.student_id = s.id
                            ORDER BY class_student.class_id LIMIT 1) as class_name')
            )
            ->limit(5)
            ->get();
        $students->each(fn($student) => $student->thumbnail_path = getThumbnailUrl($student->photo_id));
        return $students;
    }

    private function buildUpcomingBirthdays($school_id, Carbon $today)
    {
        $students = DB::table('students as s')
            ->where('s.school_id', $school_id)
            ->whereNull('s.deleted_at')
            ->whereNotNull('s.birthdate')
            ->select(
                's.id', 's.name', 's.birthdate',
                DB::raw('(SELECT classes.name FROM class_student
                            INNER JOIN classes ON classes.id = class_student.class_id
                            WHERE class_student.student_id = s.id
                            ORDER BY class_student.class_id LIMIT 1) as class_name')
            )
            ->get();

        $startOfToday = $today->copy()->startOfDay();

        return $students->map(function ($student) use ($startOfToday) {
            $birthdate = Carbon::parse($student->birthdate);
            $next = $birthdate->copy()->year($startOfToday->year)->startOfDay();
            if ($next->lt($startOfToday)) {
                $next = $next->addYear();
            }

            $student->next_birthday = $next;
            $student->days_until = $startOfToday->diffInDays($next);
            $student->turning = $next->year - $birthdate->year;

            return $student;
        })
        ->sortBy('days_until')
        ->take(5)
        ->values();
    }

    private function buildClassesOverview($school_id)
    {
        return DB::table('classes as c')
            ->leftJoin('programs as p', 'p.id', 'c.program_id')
            ->leftJoin('users as u', 'u.id', 'c.teacher_id')
            ->where('c.school_id', $school_id)
            ->whereNull('c.deleted_at')
            ->select(
                'c.id', 'c.name', 'c.tuition', 'p.name as program_name', 'u.name as teacher_name',
                DB::raw('(SELECT COUNT(*) FROM class_student WHERE class_student.class_id = c.id) as student_count')
            )
            ->orderBy('c.name')
            ->get();
    }
}
