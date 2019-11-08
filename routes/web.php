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

Route::get('/cart', function () {
    return view('cart');
});
Route::get('/shop', function () {
    return view('shop');
});
Route::get('/welcome', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\DB;
Route::get('/test', function () {
    $response = DB::select('select * from customers where customerNumber = :number or customerNumber = :number2', ['number' => '103','number2' =>'181']);
    return $response;
});
//### normal page ####
Route::get('/','DataController@index');
Route::get('/mnpd','DataController@mnproduct');
Route::get('/editproduct/{code}','DataController@editProduct');
Route::get('/mnod','DataController@mnorder');
Route::get('/mnem','DataController@mnemployee');
Route::get('/order','DataController@order');
Route::get('/checkout','DataController@checkout');
Route::get('/getCustAddr/{code}','DataController@getCustAddr');
Route::post('/insertProduct','DataController@insertProduct');
Route::post('/insertEm','DataController@insertEm');
Route::post('/updateProduct/{code}','DataController@updateProduct');
Route::post('/updateEm/{code}','DataController@updateEm');

//### function ###
Route::post('/login', 'DataController@login');
Route::delete('/deleteProduct/{code}','DataController@deleteProduct');
Route::delete('/deleteEm/{code}','DataController@deleteEm');
