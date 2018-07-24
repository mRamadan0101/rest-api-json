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


Route::get('/', 'Find@index');
Route::post('/', 'Find@sorting');
Route::get('/search','Find@search');
Route::get('/search2','Find@pricesearch');
Route::get('/search3','Find@datesearch');