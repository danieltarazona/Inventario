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

// ProductsController
Route::resource('products', 'ProductsController');

// MaintenancesController
Route::resource('maintenances', 'MaintenancesController', ['except' => ['destroy']]);

// SellersController
Route::resource('sellers', 'SellersController');

// AdminsController
Route::resource('admins', 'AdminsController');

// SalesController
Route::resource('sales', 'SalesController');

// OrdersController
Route::resource('orders', 'OrdersController');

// CategoriesController
Route::resource('categories', 'CategoriesController');

// StoresController
Route::resource('stores', 'StoresController');
