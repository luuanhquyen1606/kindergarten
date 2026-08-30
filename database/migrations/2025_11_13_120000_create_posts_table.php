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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->string('title', 256);
            $table->text('summary')->nullable();
            $table->text('content');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->unsignedBigInteger('photo_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('slug', 256)->nullable();
            $table->tinyInteger('is_published')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->bigInteger('routing_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
