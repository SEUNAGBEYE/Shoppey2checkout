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
    return view('layouts.index');
});

// GET SIGNUP AND SIGNIN


Route::group(['prefix' => 'user'], function() {

		Route::post('/signup', [
		'uses' => 'UserController@postSignup',
		'as'   => 'user.signup'
		]);

		Route::get('/signup', [
		'uses' => 'UserController@getSignup',
		'as'   => 'user.signup'
		]);

		Route::get('/signin', [
			'uses' => 'UserController@getSignin',
			'as'   => 'user.signin'
			]);

		Route::post('/signin', [
			'uses' => 'UserController@postSignin',
			'as'   => 'user.signin'
			]);

		
		Route::get('/profile', [
			'uses' => 'UserController@getProfile',
			'as'   => 'user.profile', 
			]);

		Route::get('/logout', [
			'uses' => 'UserController@getLogout',
			'as'   => 'user.logout', 
			]);
});






Route::get('/product/cart', [
	'uses' =>'ProductController@showCart',
	'as' => 'shopping-cart'
	]);
Route::post('/product/{id}', 'ProductController@addToCart');
Route::get('/product', [
	'uses' => 'ProductController@showAllProduct',
	'as' => 'product.index'
	]);
Route::get('/clearCart', 'ProductController@clearCart');
Route::get('/removeItem/{id}', ['uses'=>'ProductController@removeItem']);
Route::get('/removeAllItem', 'ProductController@removeAllItem');
Route::get('/checkout', [
	'uses' => 'ProductController@getCheckout',
	'as' => 'checkout'
	]);

Route::post('/checkout', [
	'uses' => 'ProductController@postCheckout',
	'as' => 'checkout'
	]);


// ROUTE FOR ADMIN



Route::group(['prefix'=>'admin', 'middleware'=>['admin', 'superAdmin']], function(){
	
	
	

	Route::get('/viewUsers', [
	'uses'=> 'AdminController@viewAllUser',
	'as' => 'viewUsers'
	]);



	Route::get('/viewProduct', [
	'uses'=> 'AdminController@viewProduct',
	'as' => 'viewProduct'
	]);

	Route::delete('/deleteProduct/{id}', [
	'uses'=> 'AdminController@viewProduct',
	'as' => 'deleteProduct'
	]);

	Route::post('/addProduct/{id}', [
	'uses'=> 'AdminController@viewProduct',
	'as' => 'addProduct'
	]);



	Route::post('updateProduct/{id}', [
	'uses'=> 'AdminController@updateProduct',
	'as' => 'updateProduct'
	]);

	Route::get('/editProduct/{id}', [
	'uses'=> 'AdminController@updateProduct',
	'as' => 'editProduct'
	]);

	Route::get('/viewOrders', [
	'uses'=> 'AdminController@viewOrders',
	'as' => 'viewOrders'
	]);

	Route::get('/dashboard', [
		'uses' => 'AdminController@dashboard',
		'as' => 'dashboard'
		]);

});



Route::get('/admin/login', [
	'uses'=> 'AdminController@login',
	'as' => 'adminLogin'
	]);

Route::post('/admin/login', [
	'uses'=> 'AdminController@login',
	'as' => 'adminLogin'
	]);


Route::group(['prefix'=>'admin','middleware'=>'superAdmin'], function(){

	Route::get('/addAdmin', [
	'uses'=> 'AdminController@addAdmin',
	'as' => 'addAdmin'
	]);

	Route::post('/addAdmin', [
	'uses'=> 'AdminController@addAdmin',
	'as' => 'addAdmin'
	]);
});




