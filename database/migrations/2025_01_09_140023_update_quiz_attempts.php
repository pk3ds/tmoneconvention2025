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
        Schema::table(config('laravel-quiz.table_names.quiz_attempts'), function (Blueprint $table) {
            $table->float('marks_obtained')->default(0);
            $table->boolean('is_passed')->default(false);
            $table->integer('correct_answers')->default(0);
            $table->integer('total_questions')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(config('laravel-quiz.table_names.quiz_attempts'), function (Blueprint $table) {
            $table->dropColumn(['marks_obtained', 'is_passed', 'correct_answers', 'total_questions']);
        });
    }
};
