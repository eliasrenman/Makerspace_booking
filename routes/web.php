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

Route::prefix('/')->group(function () {

    Route::get('redirect', 'Auth\GoogleOauthController@redirectToProvider');
    Route::get('callback', 'Auth\GoogleOauthController@handleProviderCallback');

    Route::post('', 'booking\BookingController@store');

    Route::get('login', 'booking\BookingController@login');
    Route::get('logout', 'booking\BookingController@logout');

    Route::middleware(['oauth'])->group(function () {

        Route::get('', 'booking\BookingController@index');

        Route::get('finished/{start}&{end}&{date}', 'booking\DisplayBookingController@finished');

        Route::get('error/{error}', 'booking\DisplayBookingController@error');

    });

});

//TODO Add route group for when middleware authentication is set up.
//Admin
Route::prefix('/admin')->group(function () {

    Route::get('', 'admin\AdminController@index')->name('home');

    // Authentication Routes.
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes.
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register')->name('register');

    // Password Reset Routes.
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
});
