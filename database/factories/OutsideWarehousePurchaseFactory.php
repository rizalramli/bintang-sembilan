<?php

namespace Database\Factories;

use App\Models\OutsideWarehousePurchase;
use Illuminate\Database\Eloquent\Factories\Factory;

class OutsideWarehousePurchaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OutsideWarehousePurchase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'warehouse_id' => $this->faker->numberBetween(0, 999),
            'destination' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'date' => $this->faker->date('Y-m-d'),
            'number_vehicles' => $this->faker->text($this->faker->numberBetween(5, 15)),
            'total_qty_sj' => $this->faker->numberBetween(0, 999),
            'total_volume_sj' => $this->faker->numberBetween(0, 9223372036854775807),
            'total_qty_tally' => $this->faker->numberBetween(0, 999),
            'total_volume_tally' => $this->faker->numberBetween(0, 9223372036854775807),
            'total_qty_afkir' => $this->faker->numberBetween(0, 999),
            'total_volume_afkir' => $this->faker->numberBetween(0, 9223372036854775807),
            'payment_factory' => $this->faker->numberBetween(0, 999),
            'fare_down' => $this->faker->numberBetween(0, 999),
            'grand_total' => $this->faker->numberBetween(0, 999),
            'fee' => $this->faker->numberBetween(0, 999),
            'paid' => $this->faker->numberBetween(0, 999),
            'down_payment' => $this->faker->numberBetween(0, 999),
            'nett' => $this->faker->numberBetween(0, 999),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
