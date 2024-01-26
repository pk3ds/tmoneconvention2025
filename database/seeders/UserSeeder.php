<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!App::environment('production')) {
            User::factory()->create([
                'name' => 'Nazrin Putra',
                'staff_id' => 'TM38432',
                'use_password' => true,
                'email' => 'putranaz94@gmail.com',
            ])->assignRole('admin');
        } else {
            User::factory()->create([
                'name' => 'Admin',
                'staff_id' => 'TM38432',
                'use_password' => true,
                'email' => 'admin@mail.com',
            ])->assignRole('admin');

            User::factory()->create([
                'name' => 'Committee',
                'staff_id' => 'TM12345',
                'use_password' => true,
                'email' => 'committee@mail.com',
            ])->assignRole('committee');
        }
    }
}
