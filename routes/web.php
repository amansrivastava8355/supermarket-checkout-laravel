<?php

use Illuminate\Support\Facades\Route;
use App\Checkout\CheckoutService;
use App\Checkout\Item;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (CheckoutService $checkoutService) {
    $co = $checkoutService;

    $co->scan(new Item('A', 50));
    $co->scan(new Item('B', 30));
    $co->scan(new Item('A', 50));
    $co->scan(new Item('B', 30));
    $co->scan(new Item('B', 30));
    $co->scan(new Item('B', 30));
    $co->scan(new Item('A', 50));
    $co->scan(new Item('A', 50));
    $co->scan(new Item('C', 20));
    $co->scan(new Item('D', 15));

    $total = $co->total();
    
    return "Total: $" . $total;
});
