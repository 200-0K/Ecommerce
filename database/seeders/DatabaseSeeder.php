<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\ProductImage;
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
        \App\Models\User::factory(10)->create();
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
        
        Product::factory(100)
        ->has(ProductImage::factory(3), 'images')
        ->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
