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


Route::get('/', 'HomeController@home');

Route::resource('players', 'PlayerController');
Route::resource('country', 'CountryController');

Route::get('/search', 'SearchController@index');
Route::post('/search', 'SearchController@search');

Route::get('/highscore', 'HighScoreController@index');