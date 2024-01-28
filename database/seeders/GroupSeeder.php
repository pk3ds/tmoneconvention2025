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
        Group::create([
            'name' => '01: AI-BOT',
        ]);
        Group::create([
            'name' => '02: INNOONE',
        ]);
        Group::create([
            'name' => '03: NEXTWAVE',
        ]);
        Group::create([
            'name' => '04: SUPER4',
        ]);
        Group::create([
            'name' => '05: VEE VU ',
        ]);
        Group::create([
            'name' => '06: TECHNOBLAZERS',
        ]);
        Group::create([
            'name' => '07: 7UP',
        ]);
        Group::create([
            'name' => '08: 1NNOV8',
        ]);
        Group::create([
            'name' => '09: NINEXT',
        ]);
        Group::create([
            'name' => '10: BEN10',
        ]);
        Group::create([
            'name' => '11: 11:11',
        ]);
        Group::create([
            'name' => '12: STARGAZER',
        ]);
        Group::create([
            'name' => '13: DIGITAL 13',
        ]);
        Group::create([
            'name' => '14: POWER GEN ',
        ]);
        Group::create([
            'name' => '15: MARVELLOUS',
        ]);
        Group::create([
            'name' => '16: PHOENIX RISING ',
        ]);

        // Group::factory(16)->hasUsers(40)->hasAwards(10)->create();
    }
}
