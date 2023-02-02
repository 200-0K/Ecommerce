<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        $qty = fake()->numberBetween(1, $product->qty);
        $product->decrement('qty', $qty);

        return [
            'qty' => $qty,
            'rate' => fake()->randomFloat(1, 0, 5),
            'comment' => fake('ar_SA')->realText(),
            'product_id' => $product->id,
            'invoice_id' => Invoice::inRandomOrder()->first()->id,
        ];
    }
}
