<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->createMany([
            ['name' => 'Clothing '],
            ['name' => 'Shoes'],
            ['name' => 'Consumer Electronics'],
            ['name' => 'Books'],
            ['name' => 'Movies'],
            ['name' => 'Music'],
            ['name' => 'Games']
        ]);

        Company::factory(10)->create();
        
        $products = Product::factory(100)
        ->has(ProductImage::factory(3), 'images')
        ->create();

        User::factory(10)
        ->hasAttached($products->slice(0,10), ['qty' => 1], 'cart')
        ->create();

        Invoice::factory(10)
        ->has(Order::factory(10), 'orders')
        ->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
