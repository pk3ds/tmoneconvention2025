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
        User::factory()->create([
            'name' => 'Admin',
            'staff_id' => 'TM38432',
            'email' => 'admin@mail.com',
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'Committee',
            'email' => 'committee@mail.com',
        ])->assignRole('committee');
    }
}
