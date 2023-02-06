<?php

namespace App\Http\Controllers\Web;

use App\Models\City;
use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'products' => $request->user()->cart,
        ];
        
        if ($data['products']->count() > 0) {
            $data['currency'] = 'SAR';
            $data['subtotal'] = $data['products']->sum(fn($p) => ($p->new_price ?? $p->price) * $p->pivot->qty );
            $data['tax'] = 0.15;
            $data['shipping'] = 0;
            $data['total'] = ($data['subtotal'] * (1 + $data['tax'])) + $data['shipping'];
            $data['cities'] = City::all();
        }

        return view('checkout.index', $data);
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
        $request->validate([
            'card-holder' => ['required', 'string', 'min:3', 'max:255'],
            'card-no' => ['required', 'digits_between:15,25'],
            'credit-expiry' => ['required', 'date_format:m/y', 'after:today'],
            'credit-cvc' => ['required', 'digits_between:3,4'],
            'billing-city' => ['required', 'exists:'.City::class.',id'],
            'billing-address' => ['required', 'string', 'min:3', 'max:255'],
            'billing-zip' => ['required', 'string', 'min:1', 'max:255'],
        ]);

        $user = $request->user();
        $invoice = new Invoice([
            'tax' => 0.15, 
            'address' => $request->input('billing-address'),
            'zip' => $request->input('billing-zip'),
            'city_id' => $request->input('billing-city'),
            'user_id' => $user->id
        ]);

        DB::transaction(function() use ($user, $invoice) {
            $products = $user->cart;
            $invoice->save();

            foreach($products as $product) {
                Order::create([
                    'price' => $product->new_price ?? $product->price,
                    'qty' => $product->pivot->qty,
                    'product_id' => $product->id,
                    'invoice_id' => $invoice->id
                ]);
                $user->cart()->detach($product->id);
            }
        });

        return redirect()->route('invoice.show', ['invoice' => $invoice]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
