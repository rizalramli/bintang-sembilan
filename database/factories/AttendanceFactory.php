<?php

namespace Database\Factories;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->numberBetween(0, 999),
            'check_in' => $this->faker->date('Y-m-d H:i:s'),
            'check_out' => $this->faker->date('Y-m-d H:i:s'),
            'status_check_in' => $this->faker->boolean,
            'status_check_out' => $this->faker->boolean,
            'created_check_in' => $this->faker->boolean,
            'created_check_out' => $this->faker->boolean,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
