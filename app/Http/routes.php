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

Route::resource('providers', 'ProvidersController');
Route::resource('regions', 'RegionsController');
Route::resource('states', 'StatesController', ['except' => 'show'] );
Route::resource('cities', 'CitiesController');
Route::resource('categories', 'CategoriesController');
Route::resource('stores', 'StoresController');
Route::resource('dashboard', 'DashboardController');

Route::resource('cart', 'CartController', ['except' => 'index'] );
Route::delete('/cart/remove/{cart}', array('uses' => 'CartController@remove', 'as' => 'cart.remove'));
Route::post('/cart/add/{cart}', array('uses' => 'CartController@add', 'as' => 'cart.add'));

Route::resource('maintenances', 'MaintenancesController');
Route::delete('/maintenances/{maintenances}/edit/remove/{product}', array('uses' => 'MaintenancesController@remove', 'as' => 'maintenances.remove'));
Route::post('/maintenances/{maintenances}/add', array('uses' => 'MaintenancesController@add', 'as' => 'maintenances.add'));
