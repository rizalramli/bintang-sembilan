<?php

namespace Database\Factories;

use App\Models\Salary;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'warehouse_id' => $this->faker->numberBetween(0, 999),
            'employee_id' => $this->faker->numberBetween(0, 999),
            'date' => $this->faker->date('Y-m-d'),
            'price' => $this->faker->numberBetween(0, 999),
            'volume' => $this->faker->numberBetween(0, 9223372036854775807),
            'total' => $this->faker->numberBetween(0, 999),
            'description' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
