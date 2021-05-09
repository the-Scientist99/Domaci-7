<?php

namespace Database\Seeders;

use App\Models\LocationFrom;
use App\Models\LocationTo;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $locations = [
            ['name' => 'Aerodrom Tivat'],
            ['name' => 'Aerodrom Podgorica'],
            ['name' => 'Capital Plaza'],
        ];

        foreach ($locations as $location) {
            LocationTo::query()->create($location);
            LocationFrom::query()->create($location);
        }
    }
}
