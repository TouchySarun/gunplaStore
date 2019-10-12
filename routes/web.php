<?php

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
    return view('index');
});

Route::get('/product', function () {
    return view('cart');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/detail', function () {
    return view('product-details');
});

use Illuminate\Support\Facades\DB;

Route::get('/test', function () {
    $response = DB::select('select * from customers where customerNumber = :number', ['number' => '103']); 
    return $response;
});

Route::get('/shoptest','DataController@product');
