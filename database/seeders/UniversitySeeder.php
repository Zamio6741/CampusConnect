<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('universities')->insert([

            [
                'name' => 'Kenyatta University',
                'short_name' => 'KU',
                'city' => 'Nairobi',
                'country' => 'Kenya',
            ],

            [
                'name' => 'University of Nairobi',
                'short_name' => 'UoN',
                'city' => 'Nairobi',
                'country' => 'Kenya',
            ],

            [
                'name' => 'Jomo Kenyatta University of Agriculture and Technology',
                'short_name' => 'JKUAT',
                'city' => 'Juja',
                'country' => 'Kenya',
            ],

            [
                'name' => 'Egerton University',
                'short_name' => 'EU',
                'city' => 'Nakuru',
                'country' => 'Kenya',
            ],

            [
                'name' => 'Moi University',
                'short_name' => 'MU',
                'city' => 'Eldoret',
                'country' => 'Kenya',
            ],

            [
                'name' => 'Maseno University',
                'short_name' => 'MSU',
                'city' => 'Maseno',
                'country' => 'Kenya',
            ],

            [
                'name' => 'Masinde Muliro University of Science and Technology',
                'short_name' => 'MMUST',
                'city' => 'Kakamega',
                'country' => 'Kenya',
            ],

            [
                'name' => 'Dedan Kimathi University of Technology',
                'short_name' => 'DeKUT',
                'city' => 'Nyeri',
                'country' => 'Kenya',
            ],

            [
                'name' => 'Technical University of Kenya',
                'short_name' => 'TUK',
                'city' => 'Nairobi',
                'country' => 'Kenya',
            ],

            [
                'name' => 'Technical University of Mombasa',
                'short_name' => 'TUM',
                'city' => 'Mombasa',
                'country' => 'Kenya',
            ],

            [
                'name' => 'Kisii University',
                'short_name' => 'KSU',
                'city' => 'Kisii',
                'country' => 'Kenya',
            ],

            [
                'name' => 'South Eastern Kenya University',
                'short_name' => 'SEKU',
                'city' => 'Kitui',
                'country' => 'Kenya',
            ],

            [
                'name' => 'Meru University of Science and Technology',
                'short_name' => 'MUST',
                'city' => 'Meru',
                'country' => 'Kenya',
            ],

            [
                'name' => 'Pwani University',
                'short_name' => 'PU',
                'city' => 'Kilifi',
                'country' => 'Kenya',
            ],

            [
                'name' => 'Machakos University',
                'short_name' => 'MKSU',
                'city' => 'Machakos',
                'country' => 'Kenya',
            ],

        ]);
    }
}