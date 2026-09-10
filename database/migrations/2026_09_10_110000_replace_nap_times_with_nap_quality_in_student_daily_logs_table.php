<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('student_daily_logs', function (Blueprint $table) {
            $table->enum('nap_quality', ['good', 'insufficient', 'skipped'])->nullable()->after('log_date');
        });

        Schema::table('student_daily_logs', function (Blueprint $table) {
            $table->dropColumn(['nap_start', 'nap_end']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_daily_logs', function (Blueprint $table) {
            $table->time('nap_start')->nullable()->after('log_date');
            $table->time('nap_end')->nullable()->after('nap_start');
        });

        Schema::table('student_daily_logs', function (Blueprint $table) {
            $table->dropColumn('nap_quality');
        });
    }
};
