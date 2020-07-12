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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/settings', 'UserConfigController@index')->name('settings');

Route::post('/settings', 'UserConfigController@update')->name('settings');

//Профили

Route::get('/user/{nickname}', 'ProfileController@getProfile')->name('profile.user-profile');
