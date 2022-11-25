<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'owner' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'email' => $this->faker->email,
            'phone' => $this->faker->numerify('0##########'),
            'address' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'district' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'city' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'province' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'logo' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
