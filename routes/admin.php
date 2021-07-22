<?php

Route::group(['namespace' => 'Admin'], function() {

    Route::get('/', 'HomeController@index')->name('admin.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

    // Verify
    // Route::get('email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('admin.verification.notice');
    // Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('admin.verification.verify');

});


Route::group(['namespace' => 'Admin','middleware' => ['admin.auth:admin']], function() {  

/*dashboard start*/
Route::get('/dashboard', 'Modules\Dashboard\DashboardController@dashboard')->name('admin.dashboard.home');


//notification
Route::get('/notifications', 'Modules\Notification\NotificationController@notification_list')->name('notification.list');


});