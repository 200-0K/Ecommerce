<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Output\ConsoleOutput;

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
        $product = Product::inRandomOrder()->with('category')->first();
        
        $output = new ConsoleOutput();
        while (true) {
            $res = Http::get('https://source.unsplash.com/random/');
            // $url = str($res->effectiveUri())->before('?');
            $url = $res->effectiveUri();
            
            if (ProductImage::firstWhere('url', $url) == null) break;
            // $output->writeln(['Duplicate:', $url]);
            sleep(1);
        }

        return [
            'url' => str($url),
            'product_id' => $product->id,
        ];
    }
}
