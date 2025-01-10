<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (App::environment('production')) {
            User::create([
                'name' => 'Aiman Azhari',
                'staff_id' => 'TM39712',
                'use_password' => true,
                'password' => Hash::make('password'),
                'email' => 'lolul9792@gmail.com',
                'phone_no' => '01110100119',
                'pickup_location' => 'Self Drive',
            ])->assignRole('admin');
        } else {
            User::factory()->create([
                'name' => 'Aiman Azhari',
                'staff_id' => 'TM39712',
                'pickup_location' => 'Self Drive',
                'use_password' => true,
                'password' => Hash::make('password'),
                'phone_no' => '01110100119',
                'email' => 'lolul9792@gmail.com',
            ])->assignRole('admin');

            User::factory()->create([
                'name' => 'Committee',
                'staff_id' => 'TM12345',
                'use_password' => true,
                'password' => Hash::make('password'),
                'email' => 'committee@mail.com',
            ])->assignRole('committee');

            User::factory()->create([
                'station_id' => 1,
                'name' => 'Vendor',
                'staff_id' => 'TM45678',
                'use_password' => true,
                'password' => Hash::make('password'),
                'email' => 'vendor@mail.com',
            ])->assignRole('vendor');

            User::factory()->create([
                'station_id' => 1,
                'name' => 'Product',
                'staff_id' => 'TM23456',
                'use_password' => true,
                'password' => Hash::make('password'),
                'email' => 'product@mail.com',
            ])->assignRole('product');
        }
    }
}
