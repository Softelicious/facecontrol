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
Route::get('/reminder', 'ViewController@reminder');
Route::get('/login', 'ViewController@login');
Route::get('/register', 'ViewController@register');

Route::post('/check', 'RecognitionController@checkDatabaseForMatch');
Route::post('/add', 'RecognitionController@addToBlacklist');
Route::post('/delete', 'RecognitionController@removeFromBlacklist');

Route::post('/users/login', 'UsersController@login');
Route::post('/users/register', 'UsersController@register');
