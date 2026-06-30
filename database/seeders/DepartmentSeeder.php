<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departments')->insert([

            [
                'faculty_id'=>1,
                'name'=>'Computer Science'
            ],

            [
                'faculty_id'=>1,
                'name'=>'Electrical Engineering'
            ],

            [
                'faculty_id'=>2,
                'name'=>'Accounting'
            ],

            [
                'faculty_id'=>2,
                'name'=>'Finance'
            ],

        ]);
    }
}