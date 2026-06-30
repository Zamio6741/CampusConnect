<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'Student',
                'description' => 'Regular student'
            ],
            [
                'name' => 'Lecturer',
                'description' => 'University lecturer'
            ],
            [
                'name' => 'Admin',
                'description' => 'System administrator'
            ],
            [
                'name' => 'Hostel Owner',
                'description' => 'Hostel manager'
            ],
            [
                'name' => 'Business Owner',
                'description' => 'Marketplace seller'
            ],
        ]);
    }
}