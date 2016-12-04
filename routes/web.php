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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UsersController');
Route::resource('issues', 'IssuesController');

Route::resource('events', 'EventsController');
Route::post('/events/create/search', array('uses' => 'EventsController@search', 'as' => 'events.search'));

Route::resource('sales', 'SalesController', ['except' => 'destroy', 'update']);
Route::post('/sales/{sales}/complete', array('uses' => 'SalesController@complete', 'as' => 'sales.complete'));

Route::resource('orders', 'OrdersController', ['except' => 'destroy']);
Route::post('/orders/{orders}/sale', array('uses' => 'OrdersController@sale', 'as' => 'orders.sale'));
Route::post('/orders/{orders}/cancel', array('uses' => 'OrdersController@cancel', 'as' => 'orders.cancel'));

Route::resource('roles', 'RolesController');
Route::post('/roles/{roles}/assign', array('uses' => 'RolesController@assign', 'as' => 'roles.assign'));

Route::resource('products', 'ProductsController');
Route::get('/products/search', array('uses' => 'ProductsController@search', 'as' => 'products.search'));
Route::post('/products/{products}/damage', array('uses' => 'ProductsController@damage', 'as' => 'products.damage'));

Route::resource('regions', 'RegionsController');
Route::resource('states', 'StatesController', ['except' => 'show']);
Route::resource('cities', 'CitiesController');
Route::resource('categories', 'CategoriesController');
Route::resource('stores', 'StoresController');
Route::resource('dashboard', 'DashboardController');

Route::resource('cart', 'CartController', ['except' => ['index', 'store', 'create']]);
Route::delete('/cart/remove/{product}', array('uses' => 'CartController@remove', 'as' => 'cart.remove'));
Route::post('/cart/add/{product}', array('uses' => 'CartController@add', 'as' => 'cart.add'));

Route::resource('repairs', 'RepairsController');
Route::delete('/repairs/{repairs}/remove/{product}', array('uses' => 'RepairsController@remove', 'as' => 'repairs.remove'));
Route::post('/repairs/{repairs}/add/{product}', array('uses' => 'RepairsController@add', 'as' => 'repairs.add'));
Route::post('/repairs/{repairs}/complete', array('uses' => 'RepairsController@complete', 'as' => 'repairs.complete'));
Route::post('/repairs/{repairs}/returned', array('uses' => 'RepairsController@returned', 'as' => 'repairs.returned'));
Route::post('/repairs/{repairs}/canceled', array('uses' => 'RepairsController@canceled', 'as' => 'repairs.canceled'));
