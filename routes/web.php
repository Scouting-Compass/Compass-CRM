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

Auth::routes(['verify' => 'true', 'register' => false]);

// User management routes
Route::get('users', 'Users\DashboardController@index')->name('users.index');

// User settings routes 
Route::get('user-settings/{type?}', 'Account\SettingsController@index')->name('user.settings');
Route::patch('user-settings/info', 'Account\SettingsController@updateInformation')->name('user.settings.info'); 
Route::patch('user-settings/security', 'Account\SettingsController@updateSecurity')->name('user.settings.security');

Route::get('/home', 'HomeController@index')->name('home');
