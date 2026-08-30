<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('student_tuitions', function (Blueprint $table) {
            $table->unsignedBigInteger('original_amount')->nullable()->after('amount');
            $table->foreignId('adjusted_by')->nullable()->after('note')->constrained('users')->nullOnDelete();
            $table->dateTime('adjusted_at')->nullable()->after('adjusted_by');
        });

        DB::table('student_tuitions')->update(['original_amount' => DB::raw('amount')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_tuitions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('adjusted_by');
            $table->dropColumn(['original_amount', 'adjusted_at']);
        });
    }
};
