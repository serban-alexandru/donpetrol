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
Route::get('/', 'PublicController@choose');

// auth routes 
Auth::routes(['reset' => false]);

// home page route
Route::get('/home', 'HomeController@index')->name('Home');

Route::group(['middleware' => 'auth'], function(){

    // categories page route
    Route::get('/categories', 'CategoriesController@index')->name('Categories');

    // add category route
    Route::post('/add_category', 'CategoriesController@add')->name('Add category');

    // edit category route
    Route::post('/edit_category/{category_id}', 'CategoriesController@edit')->name('Edit category');

    // delete category route
    Route::get('/delete_category/{category_id}', 'CategoriesController@delete')->name('Delete category');

    // products page route
    Route::get('/products', 'ProductsController@index')->name('Products');

    // add product route
    Route::post('/add_product', 'ProductsController@add')->name('Add product');

    // edit product route
    Route::post('/edit_product/{category_id}', 'ProductsController@edit')->name('Edit product');

    // delete product route
    Route::get('/delete_product/{category_id}', 'ProductsController@delete')->name('Delete product');

    // order page route
    Route::get('/order', 'OrdersController@index')->name('Order');

    // add to cart route
    Route::post('/add_to_cart/{product_id}', 'OrdersController@add')->name('Add to cart');

    // edit product quantity
    Route::post('/edit_product_quantity/{product_id}', 'OrdersController@edit')->name('Edit product quantity');

    // remove product from cart
    Route::get('/remove_product_from_cart/{product_id}', 'OrdersController@delete')->name('Remove product from cart');

    // send order route
    Route::post('/send_order', 'OrdersController@send')->name('Send order');

});

// Take away option
Route::get('/eat_in', 'PublicController@eatIn');

// Eat in option
Route::get('/take_away', 'PublicController@takeAway');

// unset order type
Route::get('/unset', 'PublicController@unsetType');

// Route send post request to external soap api 
Route::get('/soap_post', 'PublicController@soap');  

// Menu route
Route::get('/menu', 'PublicController@menu');