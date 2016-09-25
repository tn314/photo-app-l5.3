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

Route::resource('photos', 'PhotoController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/{name}', 'UsersController@name');

Route::post('/{name}/friend', ['as' => 'friends', 'uses' => 'UsersController@addFriend']);
Route::delete('/{name}/friend', ['as' => 'friends', 'uses' => 'UsersController@deleteFriend']);
