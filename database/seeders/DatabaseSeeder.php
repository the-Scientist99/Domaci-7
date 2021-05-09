<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Client;
use Database\Seeders\VehicleClassSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        LocationSeeder::run();
        EquipmentSeeder::run();
        CountrySeeder::run();
        VehicleClassSeeder::run();
        Vehicle::factory(10)->create();
        Client::factory(10)->create();
    }
}
