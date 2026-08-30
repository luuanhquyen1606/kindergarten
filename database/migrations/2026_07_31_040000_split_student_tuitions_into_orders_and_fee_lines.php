<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Splits student_tuitions (currently one row per fee line) into an
     * order/order-line-items shape: student_tuitions becomes the monthly
     * header (payment status lives here, once per student per month) and
     * the existing fee-line rows move to student_tuitions_fees, linked back
     * via tuition_id.
     */
    public function up(): void
    {
        Schema::rename('student_tuitions', 'student_tuitions_fees');

        // Free up the student_tuitions_* constraint names so the new
        // student_tuitions header table below can reuse them.
        Schema::table('student_tuitions_fees', function (Blueprint $table) {
            $table->dropForeign('student_tuitions_school_id_foreign');
            $table->dropForeign('student_tuitions_student_id_foreign');
        });

        Schema::create('student_tuitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools');
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->unsignedTinyInteger('month');
            $table->unsignedSmallInteger('year');
            $table->enum('status', ['unpaid', 'paid'])->default('unpaid');
            $table->dateTime('paid_at')->nullable();
            $table->foreignId('paid_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('note')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->unique(['student_id', 'year', 'month']);
        });

        Schema::table('student_tuitions_fees', function (Blueprint $table) {
            $table->foreignId('tuition_id')->nullable()->after('id')->constrained('student_tuitions')->cascadeOnDelete();
        });

        // One header row per (school, student, year, month) found among the
        // existing fee rows, aggregating their old per-line status/paid_at
        // (paid only if every existing line was already paid).
        $groups = DB::table('student_tuitions_fees')
            ->select('school_id', 'student_id', 'year', 'month')
            ->selectRaw('MAX(status) as status, MAX(paid_at) as paid_at')
            ->groupBy('school_id', 'student_id', 'year', 'month')
            ->get();

        foreach ($groups as $group) {
            $tuitionId = DB::table('student_tuitions')->insertGetId([
                'school_id' => $group->school_id,
                'student_id' => $group->student_id,
                'year' => $group->year,
                'month' => $group->month,
                'status' => $group->status,
                'paid_at' => $group->paid_at,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('student_tuitions_fees')
                ->where('school_id', $group->school_id)
                ->where('student_id', $group->student_id)
                ->where('year', $group->year)
                ->where('month', $group->month)
                ->update(['tuition_id' => $tuitionId]);
        }

        Schema::table('student_tuitions_fees', function (Blueprint $table) {
            $table->unsignedBigInteger('tuition_id')->nullable(false)->change();
        });

        Schema::table('student_tuitions_fees', function (Blueprint $table) {
            $table->dropIndex('student_tuitions_student_id_index');
            $table->dropColumn(['school_id', 'student_id', 'year', 'month', 'status', 'paid_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_tuitions_fees', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->after('id')->constrained('schools');
            $table->foreignId('student_id')->nullable()->after('school_id')->constrained('students')->cascadeOnDelete();
            $table->unsignedSmallInteger('year')->nullable()->after('type');
            $table->unsignedTinyInteger('month')->nullable()->after('type');
            $table->enum('status', ['unpaid', 'paid'])->default('unpaid')->after('note');
            $table->dateTime('paid_at')->nullable()->after('status');
        });

        DB::table('student_tuitions_fees as f')
            ->join('student_tuitions as t', 't.id', 'f.tuition_id')
            ->update([
                'f.school_id' => DB::raw('t.school_id'),
                'f.student_id' => DB::raw('t.student_id'),
                'f.year' => DB::raw('t.year'),
                'f.month' => DB::raw('t.month'),
                'f.status' => DB::raw('t.status'),
                'f.paid_at' => DB::raw('t.paid_at'),
            ]);

        Schema::table('student_tuitions_fees', function (Blueprint $table) {
            $table->unsignedBigInteger('school_id')->nullable(false)->change();
            $table->unsignedBigInteger('student_id')->nullable(false)->change();
            $table->unsignedTinyInteger('month')->nullable(false)->change();
            $table->unsignedSmallInteger('year')->nullable(false)->change();
        });

        Schema::table('student_tuitions_fees', function (Blueprint $table) {
            $table->dropForeign(['tuition_id']);
            $table->dropColumn('tuition_id');
        });

        Schema::dropIfExists('student_tuitions');

        Schema::rename('student_tuitions_fees', 'student_tuitions');
    }
};
