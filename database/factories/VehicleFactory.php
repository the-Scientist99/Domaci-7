<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cars = ['Golf II', 'Opel Astra', 'Mercedes S', 'Ford', 'Tesla X'];

        return [
            'name' => $cars[rand(0, 4)],
            'class_id' => rand(1, 3),
            'reg_number' => rand(10000, 99999),
            'date_of_prod' => date('Y-m-d'),
            'num_of_seats' => rand(2, 6),
            'price_per_day' => rand(5, 50),
            'vehicle_photo' => '',
        ];
    }
}
