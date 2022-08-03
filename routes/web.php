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

// Route::get('/', function () {
//     return view('guests.home');
// })->name('home');

Auth::routes();

// Route::get('/admin', 'Admin\HomeController@index')->name('admin');
Route::middleware('auth')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function () {
    Route::get('/', 'HomeController@dashboard')->name('dashboard');
    Route::resource('books', 'BookController');
});

//per gestire le rotte di vue eliminiamo la rotta principale della home in alto e mettiamo questo
Route::get("{any?}", function(){
    return view('guests.home');
   })->where("any", ".*")->name('home');
