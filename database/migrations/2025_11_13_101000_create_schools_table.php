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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('domain', 100)->nullable();
            $table->unsignedBigInteger('theme_id')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('cordination', 100)->nullable();
            $table->foreignId('home_page_id')->nullable()->constrained('pages');
            $table->string('principal_name', 100)->nullable();
            $table->string('principal_email', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('google_map', 256)->nullable();
            $table->string('principal_phone', 100)->nullable();
            $table->string('slogan', 256)->nullable();
            $table->text('map_embed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
