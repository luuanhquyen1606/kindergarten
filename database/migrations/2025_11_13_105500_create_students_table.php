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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->string('name');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('photo_id')->nullable();
            $table->string('address', 256)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('gender', 100)->nullable();
            $table->string('slug', 100)->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->bigInteger('father_id')->nullable();
            $table->bigInteger('mother_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
