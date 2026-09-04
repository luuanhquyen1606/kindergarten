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
        Schema::rename('class_post', 'post_class');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('post_class', 'class_post');
    }
};
