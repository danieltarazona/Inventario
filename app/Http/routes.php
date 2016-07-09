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
Route::resource('maintenances', 'MaintenancesController');

// SellersController
Route::resource('sellers', 'SellersController');

// ResellersController
Route::resource('resellers', 'ResellersController');

// ResellersController
Route::resource('manufacturers', 'ManufacturersController');

// IssuesController
Route::resource('issues', 'IssuesController');

// DashboardController
Route::resource('dashboard', 'DashboardController');

// DashboardController
Route::resource('logs', 'LogsController');

// SalesController
Route::resource('sales', 'SalesController');

// SalesController
Route::resource('cities', 'CitiesController');

// OrdersController
Route::resource('orders', 'OrdersController');

// CategoriesController
Route::resource('categories', 'CategoriesController', ['except' => ['create', 'show']]);

// StoresController
Route::resource('stores', 'StoresController');
