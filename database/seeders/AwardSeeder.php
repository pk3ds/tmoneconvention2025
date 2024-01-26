<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Award;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        Award::factory(20)->create([
            'awardable_type' => User::class,
            'awardable_id' => $faker->numberBetween(1, 640),
        ]);
    }
}
