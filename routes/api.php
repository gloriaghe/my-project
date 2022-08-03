<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/book', 'Api\bookController@index')->name('api.books.index');
Route::get('/book/random', 'Api\bookController@random')->name('api.books.random');
Route::get('/book/{book}', 'Api\bookController@show')->name('api.books.show');
