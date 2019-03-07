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

Route::view('/', 'home');

Route::get('movies', 'MoviesController@index');
Route::get('movies/create', 'MoviesController@create');
Route::post('movies', 'MoviesController@store');

Route::get('movies/demo', 'MoviesController@demo');
