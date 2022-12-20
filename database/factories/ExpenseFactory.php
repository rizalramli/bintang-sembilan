<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'warehouse_id' => $this->faker->numberBetween(0, 999),
            'date' => $this->faker->date('Y-m-d'),
            'description' => $this->faker->boolean,
            'type' => $this->faker->boolean,
            'amount' => $this->faker->numberBetween(0, 999),
            'ref_id' => $this->faker->numberBetween(0, 999),
            'ref_table' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
