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
        Schema::create('class_meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
            $table->foreignId('class_id')->constrained('classes')->cascadeOnDelete();
            $table->date('meal_date');
            $table->text('breakfast')->nullable();
            $table->text('lunch')->nullable();
            $table->text('snack')->nullable();
            $table->text('dinner')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('photo_id')->nullable()->constrained('files')->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->dateTime('deleted_at')->nullable();

            $table->unique(['class_id', 'meal_date']);
            $table->index(['school_id', 'meal_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_meals');
    }
};
