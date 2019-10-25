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
Route::get('/product', function () {
    return view('cart');
});
Route::get('/shop', function () {
    return view('shop');
});
use Illuminate\Support\Facades\DB;
Route::get('/test', function () {
    $response = DB::select('select * from customers where customerNumber = :number or customerNumber = :number2', ['number' => '103','number2' =>'181']);
    return $response;
});
Route::get('/','DataController@index');
Route::get('/mnpd','DataController@mnproduct');
Route::get('/mnod','DataController@mnorder');
Route::get('/mnem','DataController@mnemployee');
Route::get('/order','DataController@order');
Route::get('/checkout','DataController@checkout');

