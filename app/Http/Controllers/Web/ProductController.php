<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category', 'images', 'orders'])->where('qty', '>', 0)->simplePaginate(15);
        foreach ($products as $product) {
            $product->price = round($product->price);
            if ($product->new_price) $product->new_price = round($product->new_price);
            $product->cover = $product->images[0]->url;
            $product->currency = 'SAR';
            $product->rate = round($product->orders->avg('rate'), 2);
            $product->commentsCount = $product->orders->whereNotNull('comment')->count('comment');
        }
        return view('products.index', ['products' => $products]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load(['images', 'orders' => ['invoice'], 'company']);
        $product->price = round($product->price);
        if ($product->new_price) $product->new_price = round($product->new_price);
        $product->cover = $product->images[0]->url;
        $product->currency = 'SAR';
        $product->rate = round($product->orders->avg('rate') ?? 0, 2);
        $product->ordersWithComments = $product->orders->whereNotNull('comment');
        $product->commentsCount = $product->ordersWithComments->count('comment');
        
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
