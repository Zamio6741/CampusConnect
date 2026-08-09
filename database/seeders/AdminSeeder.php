<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'Admin')->firstOrFail();

        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@campusconnect.test')],
            [
                'name' => env('ADMIN_NAME', 'CampusConnect Admin'),
                'password' => env('ADMIN_PASSWORD'),
                'role_id' => $adminRole->id,
            ]
        );
    }
}