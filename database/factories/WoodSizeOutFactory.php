<?php

namespace Database\Factories;

use App\Models\WoodSizeOut;
use Illuminate\Database\Eloquent\Factories\Factory;

class WoodSizeOutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WoodSizeOut::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'wood_category_out_id' => $this->faker->numberBetween(0, 999),
            'length' => $this->faker->numberBetween(0, 9223372036854775807),
            'width' => $this->faker->numberBetween(0, 9223372036854775807),
            'height' => $this->faker->numberBetween(0, 9223372036854775807),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
