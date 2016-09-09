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

Route::resource('users', 'UsersController');
Route::resource('issues', 'IssuesController');
Route::resource('orders', 'OrdersController');
Route::resource('sales', 'SalesController');
Route::resource('roles', 'RolesController');

Route::resource('products', 'ProductsController');
Route::get('/products/search', array('uses' => 'ProductsController@search', 'as' => 'products.search'));

Route::resource('maintenances', 'MaintenancesController');
Route::resource('providers', 'ProvidersController');
Route::resource('regions', 'RegionsController');
Route::resource('states', 'StatesController', ['except' => 'show'] );
Route::resource('cities', 'CitiesController');
Route::resource('categories', 'CategoriesController');
Route::resource('stores', 'StoresController');
Route::resource('dashboard', 'DashboardController');

Route::resource('cart', 'CartController', ['except' => 'index'] );
Route::delete('/cart/remove/{id}', array('uses' => 'CartController@remove', 'as' => 'cart.remove'));
Route::post('/cart/add/{id}', array('uses' => 'CartController@add', 'as' => 'cart.add'));
