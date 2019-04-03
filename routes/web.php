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
Route::prefix('/')->group(function() {
    Route::post('', 'booking\BookingController@store');

    Route::get('', 'booking\BookingController@index');

    Route::get('finished/{start}&{end}&{date}', 'booking\DisplayBookingController@finished');

    Route::get('error/{error}', 'booking\DisplayBookingController@error');

    Route::get('/debug', function () {
        return view('welcome');
    });

});

//TODO Add route group for when middleware authentication is set up.
//Admin
Route::prefix('/admin')->group(function() {

    Route::resource('', 'admin\AdminController');
    Route::resource('/equipment', 'admin\EquipmentController');

});


