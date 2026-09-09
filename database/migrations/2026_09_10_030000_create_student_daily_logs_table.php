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
        Schema::create('student_daily_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
            $table->foreignId('class_id')->constrained('classes')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->date('log_date');
            $table->time('nap_start')->nullable();
            $table->time('nap_end')->nullable();
            $table->string('mood', 30)->nullable();
            $table->enum('meal_amount', ['none', 'some', 'most', 'all'])->nullable();
            $table->unsignedInteger('potty_count')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->dateTime('deleted_at')->nullable();

            $table->unique(['student_id', 'log_date']);
            $table->index(['class_id', 'log_date']);
            $table->index(['school_id', 'log_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_daily_logs');
    }
};
