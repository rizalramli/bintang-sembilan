<?php

namespace Database\Factories;

use App\Models\WoodCategoryOut;
use Illuminate\Database\Eloquent\Factories\Factory;

class WoodCategoryOutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WoodCategoryOut::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'template_wood_out_id' => $this->faker->numberBetween(0, 999),
            'product_id' => $this->faker->numberBetween(0, 999),
            'wood_type_id' => $this->faker->numberBetween(0, 999),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
