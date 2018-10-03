<?php

/*
|--------------------------------------------------------------------------
| Web authentication Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web authentication routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => 'true', 'register' => false]);

// User settings routes
Route::get('user-settings/{type?}', 'Account\SettingsController@index')->name('user.settings');
Route::patch('user-settings/info', 'Account\SettingsController@updateInformation')->name('user.settings.info');
Route::patch('user-settings/security', 'Account\SettingsController@updateSecurity')->name('user.settings.security');
