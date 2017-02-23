<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
		'uses' => 'ProductController@getIndex',
		'as' => 'product.index',
	]);

Route::get('/add-to-cart/{id}', [
		'uses' => 'ProductController@getAddToCart',
		'as' => 'product.addtocart',
	]);

Route::get('/reduce/{id}', [
		'uses' => 'ProductController@getReduceByOne',
		'as' => 'product.reducebyone',
	]);

Route::get('/remove/{id}', [
		'uses' => 'ProductController@getRemoveItem',
		'as' => 'product.remove',
	]);


Route::get('/shoppingcart', [
		'uses' => 'ProductController@getCart',
		'as' => 'product.shoppingcart',
	]);

Route::get('/checkout', [
		'uses' => 'ProductController@getCheckout',
		'as' => 'checkout',
		'middleware' => 'auth'
	]);

Route::post('/checkout', [
		'uses' => 'ProductController@postCheckout',
		'as' => 'checkout',
		'middleware' => 'auth'
	]);

Auth::routes();

Route::get('/shop/index', 'HomeController@index');

Route::get('/user/profile', [
		'uses' => 'HomeController@getProfile',
		'as' => 'user.profile',
		'middleware' => 'auth',
	]);

//Route::get('/user/profile','HomeController@getProfile');
