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

Route::get('/welcome', function () {
    return view('welcome');
})->name('home-welcome');

Route::get('/','PageController@welcome')->name('welcome');
Route::get('/home','HomeController@index')->name('home');
// Route::get('/login','CustomController@login')->name('login');
// Route::post('/login','CustomController@loginAccount')->name('login');
Route::post('/logout','CustomController@logoutAccount')->name('logout');
Route::view('/passcode-login','passcode')->name('passcode-login');
Route::post('/passcode-login','CustomController@passcodeLogin')->name('passcode-login');

Route::post('/upload','PageController@upload')->name('upload');

Route::get('/auth/facebook', 'FacebookController@redirect')->name('fb.redirect');
  Route::get('/auth/facebook/callback', 'FacebookController@callback')->name('fb.callback');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');