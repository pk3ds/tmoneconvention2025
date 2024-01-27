<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        return [
            'name' => $name,
            'description' => fake()->sentence(),
            'slug' => Str::slug($name),
            'time_between_attempts' => 0,
            'total_marks' => 20,
            'pass_marks' => 14,
        ];
    }
}
