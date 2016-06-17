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

Route::get('/users', 'Users@users');

Route::get('/users/register', 'Users@dashboard');

Route::get('/users/{user}', 'Users@profile');
Route::patch('/users/{user}', 'Users@update');

Route::get('/inventory', 'InventoryController@dashboard');
Route::post('/inventory', 'InventoryController@save');

Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@welcome');
Route::get('/home', 'Users@users');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');

Route::auth();
