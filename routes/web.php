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

//TODO Add route group when middleware is set up with google oauth
Route::resource('/', 'BookingController');

Route::get('/finished/{data}', 'DisplayBookingController@finished');

Route::get('/error/{data}', 'DisplayBookingController@error');

//TODO Add route group for when middleware authentication is set up.
//Admin
Route::resource('/admin', 'AdminController');
Route::resource('/admin/equipment', 'EquipmentController');