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

Route::get('/', 'Index@Welcome');
Route::get('/about', 'Index@About');
Route::get('/contact', 'Index@Contact');


Route::get('/users', 'Users@Users');

Route::get('/users/register', 'Users@Dashboard');
Route::post('/users/register', 'Users@Create');

Route::get('/users/{user}', 'Users@Profile');
Route::patch('/users/{user}', 'Users@Update');

Route::get('/inventory', 'Inventories@Dashboard');
Route::post('/inventory', 'Inventories@Save');
