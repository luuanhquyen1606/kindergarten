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
        Schema::dropIfExists('thumbnails');
        Schema::dropIfExists('thumbnail_sizes');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('thumbnail_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('size', 100);
            $table->integer('value')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('thumbnails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('file_id');
            $table->string('path', 256);
            $table->string('size', 256);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->unsignedBigInteger('thumbnail_size_id')->nullable();
        });
    }
};
