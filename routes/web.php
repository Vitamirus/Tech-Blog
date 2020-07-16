<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', function () {
    return redirect('/user/'.Auth::user()->nickname);
})->name('home');

Route::get('/settings', 'UserConfigController@index')->name('settings');

Route::post('/settings', 'UserConfigController@update')->name('settings');

//Профили

Route::get('/user/{nickname}', 'ProfileController@getProfile')->name('profile.user-profile');

Route::post('/article', 'ArticleController@addArticle')->name('article');

//
Route::post('/delete_article', 'ArticleController@deleteArticle')->name('delete_article');

Route::post('/status', 'UserConfigController@update')->name('status');

Route::get('/chat-menu', 'ChatController@index')->name('chat-menu');

Route::get('/chat', 'ChatController@index_item')->name('chat');

