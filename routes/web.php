<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\InvoiceController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/locale/{locale}', function ($locale) {
    if (!in_array($locale, ['ar', 'en'])) {
        abort(400);
    }
    session()->put('locale', $locale);
    return back();
})->name('locale.update');

Route::get('/explore', [ProductController::class, 'index'])->name('explore');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.proceed');
    
    Route::get('/invoice/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
