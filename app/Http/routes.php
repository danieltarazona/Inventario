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

Route::group(['namespace' => 'Admin'], function()
{
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
});

Route::group(['namespace' => 'User'], function()
{
  Route::get('/users', 'Users@read');

  Route::get('/users/{user}', 'Users@profile');
  Route::patch('/users/{user}', 'Users@update');

  Route::get('/users/delete', 'Users@delete');

  Route::get('/', 'HomeController@index');
  Route::get('/dashboard', 'HomeController@welcome');
  Route::get('/about', 'HomeController@about');
  Route::get('/contact', 'HomeController@contact');

  Route::auth();

});

Route::group(['namespace' => 'Storer'], function()
{
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
});
