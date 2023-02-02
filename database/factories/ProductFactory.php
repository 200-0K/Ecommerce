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
        $price = fake()->numberBetween(100, 5000);

        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'price' => $price,
            'new_price' => fake()->randomDigit() > 7 ? fake()->numberBetween($price*0.5, $price*0.75) : null,
            'qty' => fake()->numberBetween(10, 10000),
            'category_id' => Category::inRandomOrder()->first()->id,
            'company_id' => Company::inRandomOrder()->first()->id,
        ];
    }
}
