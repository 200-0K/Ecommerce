<?php

use Illuminate\Support\Facades\Route;

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

Route::get('test', fn() => 'test');
Route::view('phone', 'welcome');
Route::view('phonedisplay', 'phonedetails', [
    'type' => 'iPhone 14 Pro',
    'price' => 3750,
    'color' => 'Deep Purple',
    'currency' => 'SAR'
]);
Route::view('oldphone', 'old.oldphone');

Route::view('grid', 'grid', [ // Using tailwindcss instead of Bootstrap
    'type' => 'iPhone 14 Pro',
    'price' => 3750,
    'number' => '+966000000000',
    'currency' => 'SAR'
]);