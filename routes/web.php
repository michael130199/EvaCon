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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listTrace', 'HomeController@getListTrace')->middleware('auth');
Route::get('/users', 'UserController@index')->middleware('auth');
Route::put('/users/{user}', 'UserController@update')->middleware('auth');
Route::put('/users/{user}', 'UserController@update')->middleware('auth');
Route::delete('/users/{user}', 'UserController@destroy')->middleware('auth');
