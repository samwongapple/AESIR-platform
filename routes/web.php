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

Route::get('/client', 'ClientController@index')->name('client.index')->middleware('client');
Route::get('/client/create', 'ClientController@create')->name('client.create');
Route::post('/client', 'ClientController@store')->name('client.store');
Route::get('/client/{user}', 'ClientController@show')->name('client.show')->middleware('client');

Route::get('/therapist', 'TherapistController@index')->name('therapist.index')->middleware('therapist');
Route::get('/therapist/create', 'TherapistController@create')->name('therapist.create');
Route::post('/therapist', 'TherapistController@store')->name('therapist.store');
Route::get('/therapist/{user}', 'TherapistController@show')->name('therapist.show')->middleware('therapist');

