<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quiz = Quiz::create([
            'name' => 'TM One Quiz',
            'description' => 'Test your knowledge of TM One',
            'slug' => 'tm-one-quiz',
            'time_between_attempts' => 0, //Time in seconds between each attempt
            'total_marks' => 20,
            'pass_marks' => 14,
            'max_attempts' => 1,
            'is_published' => 1,
            'valid_from' => now(),
            'negative_marking_settings' => [
                'enable_negative_marks' => false,
                'negative_marking_type' => 'fixed',
                'negative_mark_value' => 0,
            ]
        ]);
    }
}
