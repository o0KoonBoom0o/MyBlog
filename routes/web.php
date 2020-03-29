<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');

Route::resource('/', 'DataController');

Route::resource('/profile', 'UserController')->middleware('auth');

Route::resource('/post', 'PostController');

Route::get('/post/create', 'PostController@create')->middleware('auth');
Route::get('/post/{id}/edit', 'PostController@edit');
