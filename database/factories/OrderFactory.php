<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Symfony\Component\Console\Output\ConsoleOutput;

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
        $output = new ConsoleOutput();
        $product = Product::inRandomOrder()->first();
        $qty = fake()->numberBetween(1, $product->qty/4);
        $product->decrement('qty', $qty);

        return [
            'price' => $product->new_price ?? $product->price,
            'qty' => $qty,
            'rate' => fake()->randomFloat(1, 0, 5),
            'comment' => fake('ar_SA')->realText(),
            'product_id' => $product->id,
            'invoice_id' => Invoice::inRandomOrder()->first()->id,
        ];
    }
}
