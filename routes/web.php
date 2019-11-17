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
// Route::get('/welcome', function () {
//     return view('welcome');
// });

use Illuminate\Support\Facades\DB;
Route::get('/test', function () {
    $response = DB::select('select * from customers where customerNumber = :number or customerNumber = :number2', ['number' => '103','number2' =>'181']);
    return $response;
});
//### normal page ####
Route::get('/','DataController@index');
Route::get('/welcome','DataController@promotion');
Route::get('/mnpd','DataController@mnproduct');
Route::get('/mnod','DataController@mnorder');
Route::get('/mnem','DataController@mnemployee');
Route::get('/order','DataController@order');
Route::get('/checkout','DataController@checkout');
Route::get('/shipping','DataController@shipping');
// Route::get('/promotion','DataController@');

//### function ###
Route::get('/getAddress/{code}','DataController@getAddress');
Route::get('/editproduct/{code}','DataController@editProduct');
Route::get('/editstatus/{code}','DataController@editstatus');
Route::get('/successOrder','DataController@successOrder');
Route::post('/insertProduct','DataController@insertProduct');
Route::post('/updateProduct/{code}','DataController@updateProduct');
Route::post('/login', 'DataController@login');
Route::post('/stock', 'DataController@stock');
Route::post('/insertEm','DataController@insertEm');
Route::post('/updateProduct/{code}','DataController@updateProduct');
Route::post('/updateEm/{code}','DataController@updateEm');
Route::get('/Subtotal', 'Datacontroller@Subtotal');
Route::post('/updateship/{code}','DataController@updateship');
Route::post('/insertToCart','DataController@insertTocart');
Route::post('/insertpromotion','DataController@insertpromotion');

//### Delete Function ###
Route::delete('/deleteProduct/{code}','DataController@deleteProduct');
Route::delete('/deleteEm/{code}','DataController@deleteEm');
