<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([

            RoleSeeder::class,

            UniversitySeeder::class,

            FacultySeeder::class,

            DepartmentSeeder::class,

            ProgrammeSeeder::class,

            SemesterSeeder::class,

            UnitSeeder::class,

        ]);
    }
}