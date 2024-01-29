<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '01: AI-BOT',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '02: INNOONE',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '03: NEXTWAVE',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '04: SUPER4',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '05: VEE VU ',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '06: TECHNOBLAZERS',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '07: 7UP',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '08: 1NNOV8',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '09: NINEXT',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '10: BEN10',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '11: 11:11',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '12: STARGAZER',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '13: DIGITAL 13',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '14: POWER GEN ',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '15: MARVELLOUS',
            ]);
        Group::factory()
            // ->hasUsers(40)
            ->create([
                'name' => '16: PHOENIX RISING ',
            ]);
    }
}
