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
Route::get('movies/{movie}', 'MoviesController@show');
Route::delete('movies/{movie}', 'MoviesController@destroy');
Route::get('movies/{movie}/edit', 'MoviesController@edit');
Route::patch('movies/{movie}', 'MoviesController@update');
Route::get('search', 'MoviesController@search');
Route::post('search', 'MoviesController@find');

Route::get('genres', 'GenresController@index');
Route::post('genres', 'GenresController@store');
Route::patch('genres/{genre}', 'GenresController@update');
Route::delete('genres/{genre}', 'GenresController@destroy');

Route::get('languages', 'LangsController@index');
Route::post('languages', 'LangsController@store');
Route::patch('languages/{lang}', 'LangsController@update');
Route::delete('languages/{lang}', 'LangsController@destroy');

Route::get('casts', 'CastsController@index');
Route::post('casts', 'CastsController@store');
Route::patch('casts/{cast}', 'CastsController@update');
Route::delete('casts/{cast}', 'CastsController@destroy');

Route::get('movies/demo', 'MoviesController@demo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
