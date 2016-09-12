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

Route::resource('events', 'EventsController');
Route::resource('users', 'UsersController');
Route::resource('issues', 'IssuesController');
Route::resource('orders', 'OrdersController');

Route::resource('roles', 'RolesController');
Route::post('/roles/{roles}/assign', array('uses' => 'RolesController@assign', 'as' => 'roles.assign'));


Route::resource('sales', 'SalesController');
Route::post('/order/{order}/sale', array('uses' => 'SalesController@store', 'as' => 'sales.store'));


Route::resource('products', 'ProductsController');
Route::get('/products/search', array('uses' => 'ProductsController@search', 'as' => 'products.search'));
Route::post('/products/{products}/damage', array('uses' => 'ProductsController@damage', 'as' => 'products.damage'));

Route::resource('regions', 'RegionsController');
Route::resource('states', 'StatesController', ['except' => 'show'] );
Route::resource('cities', 'CitiesController');
Route::resource('categories', 'CategoriesController');
Route::resource('stores', 'StoresController');
Route::resource('dashboard', 'DashboardController');

Route::resource('cart', 'CartController', ['except' => 'index'] );
Route::delete('/cart/remove/{product}', array('uses' => 'CartController@remove', 'as' => 'cart.remove'));
Route::post('/cart/add/{product}', array('uses' => 'CartController@add', 'as' => 'cart.add'));

Route::resource('maintenances', 'MaintenancesController');
Route::delete('/maintenances/{maintenances}/remove/{product}', array('uses' => 'MaintenancesController@remove', 'as' => 'maintenances.remove'));
Route::post('/maintenances/{maintenances}/add/{product}', array('uses' => 'MaintenancesController@add', 'as' => 'maintenances.add'));
Route::post('/maintenances/{maintenances}/complete', array('uses' => 'MaintenancesController@complete', 'as' => 'maintenances.complete'));
Route::post('/maintenances/{maintenances}/returned', array('uses' => 'MaintenancesController@returned', 'as' => 'maintenances.returned'));
Route::post('/maintenances/{maintenances}/canceled', array('uses' => 'MaintenancesController@canceled', 'as' => 'maintenances.canceled'));
