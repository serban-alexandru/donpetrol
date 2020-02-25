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

// landin page route
Route::get('/', function () {
    return view('welcome');
});

// auth routes 
Auth::routes();

// home page route
Route::get('/home', 'HomeController@index')->name('Home');

// categories page route
Route::get('/categories', 'CategoriesController@index')->name('Categories');

// products page route
Route::get('/products', 'ProductsController@index')->name('Products');

// order page route
Route::get('/order', 'OrdersController@index')->name('Order');