<?php

/*
|--------------------------------------------------------------------------
| Web frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web frontend routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@indexFront')->name('home.front');

// Contact routes
Route::view('/contact', 'contacts.contact')->name('contact');
Route::post('/contact', 'Contact\IndexController@send')->name('contact.send');

// Support route
Route::get('/support', 'Support\Front\SupportController@index')->name('support.index');

// City Monitor routes
Route::get('/city-monitor/{city}', 'StadsMonitor\Front\IndexController@show')->name('city-monitor.front.show');
Route::get('/city-monitor', 'StadsMonitor\Front\IndexController@index')->name('city-monitor.front.index');