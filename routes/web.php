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

Route::get('/home', 'HomeController@index')->where('vue', '[\/\w\.-]*');

Route::get('/home/{vue_capture?}', function () {
    return view('test');
})->where('vue_capture', '[\/\w\.-]*');

//Профили

Route::get('/user/{id}', 'ProfileController@getProfile')->name('profile.index');
