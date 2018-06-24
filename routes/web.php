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

Route::post('/logar', ["uses" => "UserController@Login"])->name('login');



Route::get('/', ["uses" => "UserController@home"])->name('logar');
Route::get('/logout', ["uses" => "UserController@logout"])->name('deslogar');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('painel.principal')->middleware('auth:custom');

/*=====
 *
 * Routes for Products
 *
 * =====
 */
Route::get('/myproducts', ["uses" => "Product\ProductController@index"])->
name('view.produtos')->middleware('auth:custom');
Route::get('/{id}/editproduct', ["uses" => "Product\ProductController@edit"])->name('view.editar.produto')->middleware('auth:custom');
Route::post('/editproduct', ["uses" => "Product\ProductController@EditProduct"])->name('editar.produto');
Route::post('/createproduct', ["uses" => "Product\ProductController@CreateProduct"])->name('criar.produto');
Route::get('/getforn', ["uses" => "Fornecedor\FornecedorController@getFornForProduct"])->name('get.fornecedor')->middleware('auth:custom');


/*=====
 * Routes for Stock
 * ===
 */
Route::get('/outstock', ["uses" => "Stock\StockController@SellIndex"])->
name('view.saida.produto')->middleware('auth:custom');
Route::get('/enterstock', ["uses" => "Stock\StockController@EnterIndex"])->
name('view.entrada.produto')->middleware('auth:custom');
Route::post('/getproduct', ["uses" => "Stock\StockController@getProduct"])->
name('busca.produto');
Route::post('/enterproduct', ["uses" => "Stock\StockController@enterProduct"])->
name('entrada.produto');
Route::post('/sellproduct', ["uses" => "Stock\StockController@sellProduct"])->
name('saida.produto');
Route::get('/registroEntrada', ['uses' => "Stock\StockController@registroEntrada"])->name("registro.entrada");

/*=====
 * Routes for Fornecedor
 * ===
 */
Route::get('meusfornecedores', ['uses'=>"Fornecedor\FornecedorController@meusFornecedoresIndex"])->name('view.meus.fornecedores')->middleware('auth:custom');
Route::post('meusfornecedores', ['uses'=>"Fornecedor\FornecedorController@addFornecedor"])->name('add.fornecedor')->middleware('auth:custom');
Route::get('/{id}/editfornecedor', ['uses'=>"Fornecedor\FornecedorController@editFornecedoresIndex"])->middleware('auth:custom');

Route::get('viewcadastro', ['uses'=> "RegisterController@index"])->name('view.user.cadastro');
Route::post('cadastrar', ["uses" => "RegisterController@cadastrar"])->name('user.cadastrar');

Route::get('/home', 'HomeController@index')->name('home');

