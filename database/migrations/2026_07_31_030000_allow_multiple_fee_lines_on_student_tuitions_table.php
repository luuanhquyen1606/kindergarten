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
     * Turns student_tuitions from one row per student/month into one row per
     * fee line (class fee, late pickup, absence deduction, manual
     * adjustment...) so a month's total is the sum of its rows.
     */
    public function up(): void
    {
        Schema::table('student_tuitions', function (Blueprint $table) {
            // The composite unique below is currently the only index covering
            // student_id, so MySQL uses it to satisfy the student_id foreign
            // key. Give the FK its own index before dropping that unique.
            $table->index('student_id');
        });

        Schema::table('student_tuitions', function (Blueprint $table) {
            $table->dropUnique(['student_id', 'month', 'year']);
        });

        Schema::table('student_tuitions', function (Blueprint $table) {
            $table->enum('type', ['class_fee', 'late_pickup', 'absence_deduction', 'adjustment'])
                ->default('adjustment')
                ->after('class_id');
        });

        DB::table('student_tuitions')->update(['type' => 'class_fee']);

        Schema::table('student_tuitions', function (Blueprint $table) {
            $table->bigInteger('amount')->change();
            $table->bigInteger('original_amount')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_tuitions', function (Blueprint $table) {
            $table->unsignedBigInteger('amount')->change();
            $table->unsignedBigInteger('original_amount')->nullable()->change();
            $table->dropColumn('type');
        });

        Schema::table('student_tuitions', function (Blueprint $table) {
            $table->unique(['student_id', 'month', 'year']);
        });

        Schema::table('student_tuitions', function (Blueprint $table) {
            $table->dropIndex(['student_id']);
        });
    }
};
