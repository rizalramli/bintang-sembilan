<?php

namespace Database\Factories;

use App\Models\WoodCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class WoodCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WoodCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'template_wood_id' => $this->faker->numberBetween(0, 999),
            'name' => $this->faker->text($this->faker->numberBetween(5, 125)),
            'price' => $this->faker->numberBetween(0, 999),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
