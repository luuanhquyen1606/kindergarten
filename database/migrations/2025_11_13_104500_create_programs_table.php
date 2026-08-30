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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools');
            $table->string('name', 50);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->integer('class_count')->nullable();
            $table->integer('cost')->nullable();
            $table->unsignedBigInteger('photo_id')->nullable();
            $table->string('slug', 100)->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->text('introduction')->nullable();
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->unsignedInteger('age_from')->nullable();
            $table->unsignedInteger('age_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
