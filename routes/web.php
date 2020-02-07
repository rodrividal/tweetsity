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

Route::get('/', 'Site\HomeController@index');

Auth::routes();

Route::group(['middleware' => 'auth', 'namespace' => 'Site'], function(){
    Route::resource('entries', 'EntriesController');
    Route::resource('users', 'UsersController');

    // Ajax endpoints
    Route::post('hide_tweet', 'UsersController@hideTweet');
});

Route::get('contact', 'Site\ContactController@index');
Route::post('contact', 'Site\ContactController@store');
