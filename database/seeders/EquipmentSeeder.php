<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $equipments = [
            ['name' => 'Baby sjedište'],
            ['name' => 'GPS uređaj'],
            ['name' => 'Zeleni karton'],
        ];

        foreach ($equipments as $equipment) {
            Equipment::query()->create($equipment);
        }
    }
}
