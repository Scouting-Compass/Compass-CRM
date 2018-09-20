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

Auth::routes(['verify' => 'true']);

// User routes 
Route::get('user-settings/{type?}', 'Account\SettingsController@index')->name('user.settings');

Route::get('/home', 'HomeController@index')->name('home');
