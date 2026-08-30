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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
            $table->string('name');
            $table->string('year')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreignId('program_id')->nullable()->constrained('programs');
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->string('image', 256)->nullable();
            $table->string('slug', 100)->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->unsignedBigInteger('photo_id')->nullable();
            $table->unsignedBigInteger('fee')->nullable();
            $table->text('introduction')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
