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

Route::post('/login', ["as" => "user.logar", "uses" => "UserController@Login"]);



Route::get('/', ["uses" => "UserController@home"]);
Route::get('/dashboard', function () {
    return view('dashboard');
});

/*=====
 *
 * Routes for Products
 *
 * =====
 */
Route::get('/myproducts', ["uses" => "Product\ProductController@index"]);
Route::get('/{id}/editproduct', ["uses" => "Product\ProductController@edit"]);
Route::post('/editproduct', ["uses" => "Product\ProductController@EditProduct"]);


/*=====
 * Routes for Stock
 * ===
 */
Route::get('/outstock', ["uses" => "Stock\StockController@SellIndex"]);


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

