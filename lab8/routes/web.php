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
Route::get('/review', 'ReviewController@index')->name('review');
Route::get('/review/create', 'ReviewController@create')->name('create-review');
Route::get('/review/{id}', 'ReviewController@show')->name('show-review');
Route::post('/review', 'ReviewController@store')->name('store-review');
