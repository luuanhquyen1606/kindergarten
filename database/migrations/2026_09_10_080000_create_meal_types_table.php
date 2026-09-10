<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meal_types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 30)->unique();
            $table->string('name', 100);
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();
        });

        DB::table('meal_types')->insert([
            ['code' => 'breakfast', 'name' => 'Bữa sáng', 'sort' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'lunch', 'name' => 'Bữa trưa', 'sort' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'snack', 'name' => 'Bữa xế', 'sort' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'dinner', 'name' => 'Bữa tối', 'sort' => 4, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_types');
    }
};
