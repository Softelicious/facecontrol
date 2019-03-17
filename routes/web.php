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

Route::get('/', 'ViewController@index');
Route::get('/home', 'ViewController@home');
Route::get('/security', 'ViewController@security');

Route::get('/login', 'ViewController@login');
Route::get('/test', 'ViewController@test');


Route::post('/login/auth', 'LoginController@auth');
Route::post('/checkDatabaseForMatch', 'RecognitionController@checkDatabaseForMatch');
Route::post('/add_to/blacklist', 'UsersController@addToBlacklist');
Route::post('/delete_from/blacklist', 'UsersController@removeFromBlacklist');

Route::get('/register', 'ViewController@register');
Route::get('/reminder', 'ViewController@reminder');
Route::resource('posts', 'PostsController');
Route::resource('users', 'UsersController');
