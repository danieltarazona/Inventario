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

Route::get('/', 'Index@Index');

Route::get('/about', 'Index@About');

Route::get('/users', 'Index@Users');

Route::get('/users/{user}', 'Index@User');
