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
        // surveys table
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
         });

        // survey_questions table
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');
            $table->string('question');
            $table->enum('type', ['rating', 'text']);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // survey_responses table
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('points_earned')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // survey_answers table
        Schema::create('survey_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_response_id')->constrained()->onDelete('cascade');
            $table->foreignId('survey_question_id')->constrained()->onDelete('cascade');
            $table->text('answer');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_answers');
        Schema::dropIfExists('survey_responses');
        Schema::dropIfExists('survey_questions');
        Schema::dropIfExists('surveys');
    }
};
