<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faculties')->insert([

            [
                'university_id' => 1,
                'name' => 'School of Engineering'
            ],

            [
                'university_id' => 1,
                'name' => 'School of Business'
            ],

            [
                'university_id' => 1,
                'name' => 'School of Education'
            ],

            [
                'university_id' => 2,
                'name' => 'Faculty of Science'
            ],

            [
                'university_id' => 2,
                'name' => 'Faculty of Engineering'
            ],

        ]);
    }
}