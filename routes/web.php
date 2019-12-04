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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/dashboard','HomeController@index')->name('dashboard');
//country field
Route::get('/country','CountryController@index')->name('country');
Route::post('/country','CountryController@store')->name('country_save');
//jquery todo list
Route::get('/todolist','JquerytodolistController@index')->name('todolist');
//apiResource
// Route::get('/apiResource','')->name('apiResource');
