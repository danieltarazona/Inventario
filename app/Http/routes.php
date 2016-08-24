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
Route::resource('logs', 'LogsController');
Route::resource('orders', 'OrdersController');
Route::resource('sales', 'SalesController');
Route::resource('products', 'ProductsController');
Route::resource('maintenances', 'MaintenancesController');
Route::resource('providers', 'ProvidersController');
Route::resource('regions', 'RegionsController');
Route::resource('states', 'StatesController');
Route::resource('cities', 'CitiesController');
Route::resource('categories', 'CategoriesController');
Route::resource('stores', 'StoresController');
Route::resource('dashboard', 'DashboardController');

/*
Route::resource('issues', 'IssuesController', ['except' => ['destroy']]);
Route::resource('logs', 'LogsController', ['only' => ['store']]);
Route::resource('orders', 'OrdersController');
Route::resource('sales', 'SalesController', ['only' => ['index', 'show']]);
Route::resource('products', 'ProductsController', ['only' => ['index', 'show', 'update']]);

Route::resource('maintenances', 'MaintenancesController', ['except' => ['destroy']]);
Route::resource('sales', 'SalesController', ['only' => ['index', 'edit', 'update', 'show']]);
Route::resource('orders', 'OrdersController', ['only' => ['index', 'show', 'update']]);
Route::resource('products', 'ProductsController', ['only' => ['index', 'show', 'update']]);

Route::resource('products', 'ProductsController');
Route::resource('maintenances', 'MaintenancesController', ['except' => ['create', 'store']]);
Route::resource('sales', 'SalesController', ['except' => ['create', 'store', 'destroy']]);
Route::resource('orders', 'OrdersController', ['except' => ['store', 'create']]);
Route::resource('products', 'ProductsController');
Route::resource('providers', 'ProvidersController', ['except' => ['show']]);
Route::resource('logs', 'LogsController', ['only' => ['store']]);
Route::resource('issues', 'IssuesController', ['except' => ['create', 'store', 'destroy']]);
Route::resource('regions', 'RegionsController', ['except' => ['create', 'show']]);
Route::resource('states', 'StatesController', ['except' => ['create', 'show']]);
Route::resource('cities', 'CitiesController', ['except' => ['create']]);
Route::resource('categories', 'CategoriesController', ['except' => ['create', 'show']]);
Route::resource('stores', 'StoresController');
Route::resource('dashboard', 'DashboardController', ['only' => ['index', 'edit', 'update']]);

*/
