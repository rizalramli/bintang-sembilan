<?php

namespace Database\Factories;

use App\Models\IncomingWoodTrade;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomingWoodTradeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IncomingWoodTrade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'template_wood_id' => $this->faker->numberBetween(0, 999),
            'supplier_id' => $this->faker->numberBetween(0, 999),
            'warehouse_id' => $this->faker->numberBetween(0, 999),
            'wood_type_id' => $this->faker->numberBetween(0, 999),
            'serial_number' => $this->faker->text($this->faker->numberBetween(5, 50)),
            'proof_ownership' => $this->faker->text($this->faker->numberBetween(5, 50)),
            'date' => $this->faker->date('Y-m-d'),
            'number_vehicles' => $this->faker->text($this->faker->numberBetween(5, 15)),
            'type' => $this->faker->boolean,
            'total_qty' => $this->faker->numberBetween(0, 999),
            'total_volume' => $this->faker->numberBetween(0, 9223372036854775807),
            'description' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'created_by' => $this->faker->numberBetween(0, 999),
            'updated_by' => $this->faker->numberBetween(0, 999),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
