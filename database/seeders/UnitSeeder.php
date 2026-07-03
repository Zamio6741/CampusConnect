<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Programme;
use App\Models\Semester;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $programme = Programme::first();

        if (!$programme) {
            return;
        }

        $semester1 = Semester::where('year', 1)
            ->where('semester', 1)
            ->first();

        $semester2 = Semester::where('year', 1)
            ->where('semester', 2)
            ->first();

        if (!$semester1 || !$semester2) {
            return;
        }

        Unit::insert([

            [
                'programme_id' => $programme->id,
                'semester_id' => $semester1->id,
                'unit_code' => 'CSC101',
                'unit_name' => 'Introduction to Programming',
                'lecturer' => 'Dr. John Mwangi',
                'credit_hours' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'programme_id' => $programme->id,
                'semester_id' => $semester1->id,
                'unit_code' => 'MAT121',
                'unit_name' => 'Calculus I',
                'lecturer' => 'Prof. Jane Wanjiku',
                'credit_hours' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'programme_id' => $programme->id,
                'semester_id' => $semester1->id,
                'unit_code' => 'ISC103',
                'unit_name' => 'Database Systems',
                'lecturer' => 'Mr. Peter Otieno',
                'credit_hours' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'programme_id' => $programme->id,
                'semester_id' => $semester2->id,
                'unit_code' => 'CSC102',
                'unit_name' => 'Object Oriented Programming',
                'lecturer' => 'Dr. Sarah Njeri',
                'credit_hours' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'programme_id' => $programme->id,
                'semester_id' => $semester2->id,
                'unit_code' => 'CSC104',
                'unit_name' => 'Data Structures',
                'lecturer' => 'Mr. David Kimani',
                'credit_hours' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'programme_id' => $programme->id,
                'semester_id' => $semester2->id,
                'unit_code' => 'MAT122',
                'unit_name' => 'Discrete Mathematics',
                'lecturer' => 'Prof. Grace Achieng',
                'credit_hours' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}