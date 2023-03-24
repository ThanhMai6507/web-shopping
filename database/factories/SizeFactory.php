<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
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
            'product_id' => fake()->randomElement(Product::pluck('id')),
            'color_id' => fake()->randomElement(Color::pluck('id')),
            'content' => fake()->text(),
        ];
    }
}
