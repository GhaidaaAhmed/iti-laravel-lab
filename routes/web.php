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

Route::get('posts','PostController@index')->middleware('auth');
Route::get('posts/create','PostController@create')->middleware('auth');
Route::delete('posts/{id}','PostController@destroy')->middleware('auth');
Route::get('posts/{id}/edit','PostController@edit')->middleware('auth');
Route::put('posts/{id}','PostController@update')->middleware('auth');
Route::get('posts/{id}','PostController@show')->middleware('auth');
Route::post('posts','PostController@store')->middleware('auth');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
