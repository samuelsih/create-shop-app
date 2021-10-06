<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(1),
            'stock' => $this->faker->numberBetween(3,10),
            'price' => $this->faker->randomFloat($min = 3, $max = 100, $maxDecimal = 3),
            'status' => $this->faker->randomElement(['unavailable', 'available']),
        ];
    }
}
