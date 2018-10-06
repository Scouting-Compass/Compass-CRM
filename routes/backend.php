<?php

/*
|--------------------------------------------------------------------------
| Web backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web backend routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dashboard route
Route::get('/home', 'HomeController@index')->name('home');

// User management routes
Route::get('users', 'Users\DashboardController@index')->name('users.index');
Route::get('users/create', 'Users\DashboardController@create')->name('users.create');
Route::match(['get', 'delete'], '/users/delete/{user}', 'Users\DashboardController@destroy')->name('users.delete');
Route::get('/users/show{user}', 'Users\DashboardController@show')->name('users.show');
Route::post('/users/store', 'Users\DashboardController@store')->name('users.store');

// User state routes
Route::get('/users/lock/{user}', 'Users\LockController@create')->name('users.lock');
Route::get('/users/unlock/{user}', 'Users\LockController@destroy')->name('users.unlock');
Route::post('/users/lock/{user}', 'Users\LockController@store')->name('users.lock.create');
Route::get('/users/delete/undo/{trashed_user}', 'users\DashboardController@undoDeleteRoute')->name('users.delete.undo');

// City Monitor routes 
Route::get('/city-monitor', 'StadsMonitor\Back\IndexController@index')->name('city-monitor.back.index');
