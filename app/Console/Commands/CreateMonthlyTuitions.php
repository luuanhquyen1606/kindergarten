<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateMonthlyTuitions extends Command
{
    protected $signature = 'tuitions:create-monthly';

    protected $description = "Create this month's tuition header and class fee line for every enrolled student";

    public function handle(): int
    {
        $year = now()->year;
        $month = now()->month;

        $students = DB::table('class_student')
            ->join('students', 'students.id', 'class_student.student_id')
            ->join('classes', 'classes.id', 'class_student.class_id')
            ->whereNull('students.deleted_at')
            ->select(
                'students.id as student_id',
                'students.school_id',
                'students.tuition_discount',
                'students.tuition_discount_reason',
                'classes.id as class_id',
                'classes.tuition'
            )
            ->get();

        foreach ($students as $student) {
            $tuition = $this->findOrCreateTuition($student, $year, $month);
            $this->findOrCreateClassFeeLine($tuition, $student);
        }

        $this->info("Created tuitions for {$students->count()} students for {$year}-{$month}.");

        return self::SUCCESS;
    }

    private function findOrCreateTuition($student, $year, $month)
    {
        $tuition = DB::table('student_tuitions')
            ->where('student_id', $student->student_id)
            ->where('school_id', $student->school_id)
            ->where('year', $year)
            ->where('month', $month)
            ->first();

        if ($tuition) {
            return $tuition;
        }

        $id = DB::table('student_tuitions')->insertGetId([
            'school_id' => $student->school_id,
            'student_id' => $student->student_id,
            'year' => $year,
            'month' => $month,
            'status' => 'unpaid',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return DB::table('student_tuitions')->where('id', $id)->first();
    }

    private function findOrCreateClassFeeLine($tuition, $student)
    {
        $existing = DB::table('student_tuitions_fees')
            ->where('tuition_id', $tuition->id)
            ->where('type', 'class_fee')
            ->first();

        if ($existing) {
            return $existing;
        }

        $amount = $student->tuition ?? 0;
        $discount = $student->tuition_discount ?? 0;
        $note = null;
        if ($discount > 0) {
            $amount -= round($amount * $discount / 100);
            $note = "Giảm {$discount}%" . ($student->tuition_discount_reason ? " ({$student->tuition_discount_reason})" : '');
        }

        DB::table('student_tuitions_fees')->insert([
            'tuition_id' => $tuition->id,
            'class_id' => $student->class_id,
            'type' => 'class_fee',
            'amount' => $amount,
            'original_amount' => $amount,
            'note' => $note,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
