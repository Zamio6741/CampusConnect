<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('programmes')->insert([

            [
                'department_id'=>1,
                'name'=>'BSc Computer Science',
                'duration'=>4
            ],

            [
                'department_id'=>2,
                'name'=>'BSc Electrical Engineering',
                'duration'=>5
            ],

            [
                'department_id'=>3,
                'name'=>'Bachelor of Commerce',
                'duration'=>4
            ],

        ]);
    }
}