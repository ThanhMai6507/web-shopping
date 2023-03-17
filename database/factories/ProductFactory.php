<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'price' => 2000.02,
            'old_price' => 1800.01,
            'created_by' => rand(0, 1000),
            'category_id' => fake()->randomElement(Category::pluck('id')),
            'description' => fake()->text(),
        ];
    }
}
