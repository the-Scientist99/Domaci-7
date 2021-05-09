<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VehicleClass;

class VehicleClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $classes = [
            ['name' => 'mala'],
            ['name' => 'srednja'],
            ['name' => 'premium'],
        ];

        foreach ($classes as $class) {
            VehicleClass::query()->create($class);
        }
    }
}
