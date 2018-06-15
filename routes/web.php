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

Route::post('/logar', ["uses" => "UserController@Login"]);



Route::get('/', ["uses" => "UserController@home"]);
Route::get('/logout', ["uses" => "UserController@logout"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth:custom');

/*=====
 *
 * Routes for Products
 *
 * =====
 */
Route::get('/myproducts', ["uses" => "Product\ProductController@index"])->middleware('auth:custom');
Route::get('/{id}/editproduct', ["uses" => "Product\ProductController@edit"]);
Route::post('/editproduct', ["uses" => "Product\ProductController@EditProduct"]);
Route::post('/createproduct', ["uses" => "Product\ProductController@CreateProduct"]);


/*=====
 * Routes for Stock
 * ===
 */
Route::get('/outstock', ["uses" => "Stock\StockController@SellIndex"]);
Route::get('/enterstock', ["uses" => "Stock\StockController@EnterIndex"]);
Route::post('/getproduct', ["uses" => "Stock\StockController@getProduct"]);
Route::post('/enterproduct', ["uses" => "Stock\StockController@enterProduct"]);
Route::post('/sellproduct', ["uses" => "Stock\StockController@sellProduct"]);


Route::get('viewcadastro', ['uses'=> "RegisterController@index"]);
Route::post('cadastrar', ["uses" => "RegisterController@cadastrar"]);

Route::get('/home', 'HomeController@index')->name('home');

