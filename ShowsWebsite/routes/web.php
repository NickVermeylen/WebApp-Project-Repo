<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('shows', 'ShowsController');
Route::resource('users', 'UserController');
Route::get("users/{user}/admin/{status}","userController@setAdmin");
Route::patch('shows/update, ShowsController@update');