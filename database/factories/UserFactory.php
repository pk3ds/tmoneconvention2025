<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $domain = 'tm.com.my';
        $staffId = fake()->unique()->numerify('TM#####');
        $staffEmail = $staffId . "@" . $domain;

        return [
            'name' => fake()->name(),
            'staff_id' => $staffId,
            'phone_no' => fake()->phoneNumber(),
            'email' => $staffEmail,
            'email_verified_at' => now(),
            'points' => fake()->randomNumber(3, true),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
