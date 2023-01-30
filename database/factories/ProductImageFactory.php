<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $res = Http::get('https://source.unsplash.com/random/'.fake()->randomNumber().'.'.fake()->safeColorName());
        $url = $res->effectiveUri();

        return [
            'url' => str($url),
            'product_id' => Product::inRandomOrder()->first()->id,
        ];
    }
}
