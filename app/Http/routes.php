<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

// HomeController
Route::get('/', 'HomeController@welcome');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');

// UserController
Route::resource('users', 'UsersController', ['except' => ['create', 'store']]);

Route::resource('products', 'ProductsController');

// SaleController
// Route::resource('sales', 'SalesController');

// OrderController
// Route::resource('orders', 'OrdersController');
