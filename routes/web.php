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

//The / Route group.
Route::prefix('/')->group(function () {

    //Booking store without oauth since its a ajax request.
    Route::post('', 'booking\BookingController@store');

    //Google login and logout Routes.
    Route::get('login', 'booking\BookingController@login');
    Route::get('logout', 'booking\BookingController@logout');

    //Google oauth redirect and callback Routes.
    Route::get('redirect', 'Auth\GoogleOauthController@redirectToProvider');
    Route::get('callback', 'Auth\GoogleOauthController@handleProviderCallback');

    //Google auth protected Routes.
    Route::middleware(['oauth'])->group(function () {

        //Booking page Route.
        Route::get('', 'booking\BookingController@index');

        //Finished page Route.
        Route::get('finished/{start}&{end}&{date}', 'booking\DisplayBookingController@finished');

        //error page Route.
        // Might be removed later in favour of error messages on booking page.
        Route::get('error/{error}', 'booking\DisplayBookingController@error');

    });

});


//The /admin Route group.
Route::prefix('/admin')->group(function () {

    //Admin dashboard page Route.
    Route::get('', 'admin\AdminController@index')->name('home');

    //Admin equipment crud Routes.

    Route::get('/equipment/{id}/delete', 'admin\Equipmentcontroller@destroy')
        ->name('equipment.destroy');

    Route::Resource('/equipment', 'admin\EquipmentController')
        ->except(['show', 'destroy']);

    //
    Route::get('/export', 'admin\PdfExportController@index')->name('pdf.export');
    Route::post('/export', 'admin\PdfExportController@exportPDF');
    /* Admin authentication routes */

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
