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

Route::get('/', 'ViewController@home');
Route::get('/home', 'ViewController@home');
Route::get('/login', 'ViewController@login');
Route::get('/register', 'ViewController@register');
Route::get('/reminder', 'ViewController@reminder');
Route::post('/login/auth', 'LoginController@auth');
Route::resource('posts', 'PostsController');
Route::resource('users', 'UsersController');
