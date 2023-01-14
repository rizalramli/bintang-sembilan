<?php

namespace Database\Factories;

use App\Models\TruckRental;
use Illuminate\Database\Eloquent\Factories\Factory;

class TruckRentalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TruckRental::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date('Y-m-d'),
            'number_vehicles' => $this->faker->text($this->faker->numberBetween(5, 15)),
            'driver_name' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'loading_place' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'purpose' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'truck_cost' => $this->faker->numberBetween(0, 999),
            'driver_cost' => $this->faker->numberBetween(0, 999),
            'solar_cost' => $this->faker->numberBetween(0, 999),
            'damage_cost' => $this->faker->numberBetween(0, 999),
            'description' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
