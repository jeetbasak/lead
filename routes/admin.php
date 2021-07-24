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

/*dashboard end*/



//notification
Route::get('/notifications', 'Modules\Notification\NotificationController@notification_list')->name('notification.list');


//lead manage start
Route::get('/lead', 'Modules\Lead\LeadController@lead_list')->name('lead.list');
Route::get('/lead/add', 'Modules\Lead\LeadController@lead_add_form')->name('lead.add.form');
Route::post('/lead/insert', 'Modules\Lead\LeadController@lead_insert')->name('insert.lead');
Route::get('/lead/edit/{id}', 'Modules\Lead\LeadController@lead_edit_form')->name('lead.edit');
Route::post('/lead/update', 'Modules\Lead\LeadController@update')->name('lead.update');
Route::get('/lead/delete/{id}', 'Modules\Lead\LeadController@delete_lead')->name('lead.delete');
Route::post('/lead/assing', 'Modules\Lead\LeadController@assing')->name('lead.assing');
Route::post('/lead/reassing', 'Modules\Lead\LeadController@reassing')->name('lead.reassing');
Route::get('/lead/completed', 'Modules\Lead\LeadController@completed')->name('lead.completed');
//lead manage end




// target-management
Route::get('/target', 'Modules\Target\TargetManageController@taregetList')->name('admin.target.list');
Route::get('/target/add','Modules\Target\TargetManageController@addView')->name('admin.target.add.view');
Route::post('/target/insert','Modules\Target\TargetManageController@insertTarget')->name('admin.target.insert');
Route::get('/get-months','Modules\Target\TargetManageController@getMonth')->name('admin.get.months');
Route::get('/target/delete/{id}','Modules\Target\TargetManageController@delTarget')->name('admin.del.tagets');
Route::get('/target/edit/{id}','Modules\Target\TargetManageController@editTargetView')->name('admin.edit.targets-view');
Route::post('/target/update','Modules\Target\TargetManageController@updateTraget')->name('admin.edit.targets-update');

});