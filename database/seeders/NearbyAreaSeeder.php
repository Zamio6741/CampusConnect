<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NearbyArea;

class NearbyAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [

            'Kahawa Wendani',
            'Kahawa Sukari',
            'Kahawa West',
            'Kahawa Barracks',

            'Seasons',

            'Zimmerman',

            'Roysambu',

            'TRM Area',

            'Kasarani',

            'Clay City',

            'Mwiki',

            'Githurai 44',

            'Githurai 45',

            'Membley',

            'Ruiru',

            'Kenyatta Market',

        ];

        foreach ($areas as $area) {

            NearbyArea::create([

                'name' => $area,

                // Change this if your university ID is different
                'university_id' => 1,

            ]);

        }
    }
}