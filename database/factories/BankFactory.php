<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bank::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bank' => $this->faker->word,
        'address' => $this->faker->word,
        'phone' => $this->faker->word,
        'cp' => $this->faker->word,
        'hp' => $this->faker->word,
        'mdr_debit_card' => $this->faker->randomDigitNotNull,
        'mdr_credit_card' => $this->faker->randomDigitNotNull
        ];
    }
}
