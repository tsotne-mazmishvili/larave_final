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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix("products")->group(function(){
	Route::get('/', 'ProductsController@index')->name('products');
	Route::post('/delete', 'ProductsController@destroy')->name('products_delete');
	Route::get('/edit/{id}', 'ProductsController@edit')->name('products_edit');
	Route::get('/create', 'ProductsController@create')->name('products_create');
	Route::post('/store', 'ProductsController@store')->name('products_store');
	Route::post('/update', 'ProductsController@update')->name('products_update');
});

Route::post("/cart/add", "CartsController@add_to_cart")->name("cart_add");
Route::get("/cart/index", "CartsController@index")->name("cart_index");
Route::post('cart/delete', 'CartsController@destroy')->name('carts_delete');

