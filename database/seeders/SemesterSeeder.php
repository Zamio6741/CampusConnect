<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('semesters')->insert([

            [
                'programme_id'=>1,
                'year'=>1,
                'semester'=>1
            ],

            [
                'programme_id'=>1,
                'year'=>1,
                'semester'=>2
            ],

            [
                'programme_id'=>1,
                'year'=>2,
                'semester'=>1
            ],

            [
                'programme_id'=>1,
                'year'=>2,
                'semester'=>2
            ],

        ]);
    }
}