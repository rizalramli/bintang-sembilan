<?php

namespace Database\Factories;

use App\Models\WoodSize;
use Illuminate\Database\Eloquent\Factories\Factory;

class WoodSizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WoodSize::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'wood_category_id' => $this->faker->numberBetween(0, 999),
            'name' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'volume' => $this->faker->numberBetween(0, 9223372036854775807),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
