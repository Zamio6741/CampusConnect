<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->truncate();

        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'description' => 'System administrator',
            ],
            [
                'name' => 'Student',
                'description' => 'University student',
            ],
            [
                'name' => 'Landlord',
                'description' => 'Off-campus rental owner',
            ],
            [
                'name' => 'Business Owner',
                'description' => 'Marketplace seller',
            ],
        ]);
    }
}