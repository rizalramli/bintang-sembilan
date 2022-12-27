<?php

namespace Database\Factories;

use App\Models\OutcomingWood;
use Illuminate\Database\Eloquent\Factories\Factory;

class OutcomingWoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OutcomingWood::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->numberBetween(0, 999),
            'warehouse_id' => $this->faker->numberBetween(0, 999),
            'wood_type_id' => $this->faker->numberBetween(0, 999),
            'serial_number' => $this->faker->numberBetween(0, 999),
            'date' => $this->faker->date('Y-m-d H:i:s'),
            'number_vehicles' => $this->faker->text($this->faker->numberBetween(5, 15)),
            'total_qty' => $this->faker->numberBetween(0, 999),
            'total_volume' => $this->faker->numberBetween(0, 9223372036854775807),
            'cost' => $this->faker->numberBetween(0, 999),
            'description' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'type' => $this->faker->boolean,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
