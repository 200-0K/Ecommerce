<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
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
    public function definition()
    {
        return [
            'name' => fake()->name(3, true),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(100, 5000),
            'qty' => fake()->numberBetween(10, 10000),
            'rate' => fake()->randomFloat(1, 0, 10),
            'category_id' => Category::inRandomOrder()->first()->id,
            'company_id' => Company::inRandomOrder()->first()->id,
        ];
    }
}
