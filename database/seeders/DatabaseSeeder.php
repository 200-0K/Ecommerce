<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\City;
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

        City::factory()->createMany([
            ['name' => 'الرياض'],
            ['name' => 'جده'],
            ['name' => 'المدينه المنوره'],
            ['name' => 'تبوك'],
            ['name' => 'الدمام'],
            ['name' => 'الاحساء'],
            ['name' => 'القطيف'],
            ['name' => 'خميس مشيط'],
            ['name' => 'المظيلف'],
            ['name' => 'الهفوف'],
            ['name' => 'المبرز'],
            ['name' => 'الطائف'],
            ['name' => 'نجران'],
            ['name' => 'حفر الباطن'],
            ['name' => 'الجبيل'],
            ['name' => 'ضباء'],
            ['name' => 'الخرج'],
            ['name' => 'الثقبة'],
            ['name' => 'ينبع البحر'],
            ['name' => 'الخبر'],
            ['name' => 'عرعر'],
            ['name' => 'الحوية'],
            ['name' => 'عنيزه'],
            ['name' => 'سكاكا'],
            ['name' => 'جيزان'],
            ['name' => 'القريات'],
            ['name' => 'الظهران'],
            ['name' => 'الباحة'],
            ['name' => 'الزلفي'],
            ['name' => 'الرس'],
            ['name' => 'وادى الدواسر'],
            ['name' => 'بيشه'],
            ['name' => 'سيهات'],
            ['name' => 'شروره'],
            ['name' => 'بحره'],
            ['name' => 'تاروت'],
            ['name' => 'الدوادمى'],
            ['name' => 'صبياء'],
            ['name' => 'بيش'],
            ['name' => 'احد رفيدة'],
            ['name' => 'الفريش'],
            ['name' => 'بارق'],
            ['name' => 'الحوطه'],
            ['name' => 'الافلاج'],
        ]);

        Company::factory(10)->create();

        $products = Product::factory(100)
            ->has(ProductImage::factory(3), 'images')
            // ->has(ProductImage::factory(3)->uniqueImage(), 'images') // If you want to generate unique images (this takes more time long)
            ->create();

        User::factory(10)
            ->hasAttached($products->slice(0, 10), ['qty' => 1], 'cart')
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
