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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->string('image', 256)->nullable();
            $table->string('title', 256);
            $table->text('summary')->nullable();
            $table->text('content');
            $table->unsignedBigInteger('price');
            $table->timestamp('start_at')->nullable()->useCurrent();
            $table->timestamp('end_at')->nullable()->useCurrent();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->dateTime('deleted_at')->nullable();
            $table->unsignedBigInteger('photo_id')->nullable();
            $table->tinyInteger('accept_donation')->nullable();
            $table->string('slug', 256)->nullable();
            $table->string('location', 256)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
