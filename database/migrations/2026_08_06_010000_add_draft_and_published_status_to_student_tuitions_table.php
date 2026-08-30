<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE student_tuitions MODIFY status ENUM('draft', 'published', 'unpaid', 'paid') NOT NULL DEFAULT 'draft'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE student_tuitions MODIFY status ENUM('unpaid', 'paid') NOT NULL DEFAULT 'unpaid'");
    }
};
