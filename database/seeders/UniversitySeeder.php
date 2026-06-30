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
                'country' => 'Kenya'
            ],

            [
                'name' => 'University of Nairobi',
                'short_name' => 'UoN',
                'city' => 'Nairobi',
                'country' => 'Kenya'
            ],

            [
                'name' => 'JKUAT',
                'short_name' => 'JKUAT',
                'city' => 'Juja',
                'country' => 'Kenya'
            ],

            [
                'name' => 'Egerton University',
                'short_name' => 'EU',
                'city' => 'Nakuru',
                'country' => 'Kenya'
            ],

            [
                'name' => 'Moi University',
                'short_name' => 'MU',
                'city' => 'Eldoret',
                'country' => 'Kenya'
            ],

        ]);
    }
}