<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $countries = [
            ['name' => 'Crna Gora'],
            ['name' => 'Srbija'],
            ['name' => 'Hrvatska'],
            ['name' => 'Bosna i Hercegovina'],
            ['name' => 'Albanija'],
            ['name' => 'Makedonija'],
        ];

        foreach ($countries as $country) {
            Country::query()->create($country);
        }
    }
}
