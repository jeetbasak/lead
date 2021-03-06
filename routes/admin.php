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


      Route::get('forget-password','Auth\ForgotPasswordController@showForget')->name('admin.forget.password.view');
      Route::post('forget-password/send-mail','Auth\ForgotPasswordController@sendMail')->name('admin.forget.password');
      Route::get('reset-password/{vcode}','Auth\ForgotPasswordController@resetpassword')->name('admin.password.confirm');
      Route::post('reset-password/new-password','Auth\ForgotPasswordController@newPassword')->name('admin.new.password.set');
});


Route::group(['namespace' => 'Admin','middleware' => ['admin.auth:admin']], function() {  

/*dashboard start*/
Route::get('/dashboard', 'Modules\Dashboard\DashboardController@dashboard')->name('admin.dashboard.home');

/*dashboard end*/



//notification
Route::get('/notifications', 'Modules\Notification\NotificationController@notification_list')->name('notification.list');
Route::get('/notification/admin/count','Modules\Notification\NotificationController@not_count')->name('admin.not.count');


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
Route::post('/target/assing', 'Modules\Target\TargetManageController@assing')->name('target.assing');
Route::get('/target/expiry', 'Modules\Target\TargetManageController@exptaregetList')->name('exp.target.list');



// user-management
Route::get('/user','Modules\ManageUser\ManageUserController@userList')->name('admin.user.list');
Route::get('/user/delete/{id}','Modules\ManageUser\ManageUserController@deleteUser')->name('admin.user.delete');
Route::get('/user/edit-user/{id}','Modules\ManageUser\ManageUserController@editView')->name('admin.user.edit');
Route::post('/user/update-user','Modules\ManageUser\ManageUserController@updateUser')->name('admin.user.update');
Route::post('/user/check-email','Modules\ManageUser\ManageUserController@checkEmail')->name('admin.user.check.email');
Route::get('/user/status/{id}','Modules\ManageUser\ManageUserController@changeStatus')->name('admin.user.change.status');
Route::get('/user/view/{id}','Modules\ManageUser\ManageUserController@viewUser')->name('admin.user.view');




//turorial
Route::get('/tutorial','Modules\Tutorial\TutorialController@list')->name('tutorial.list');
Route::get('/tutorial/add','Modules\Tutorial\TutorialController@add_form')->name('tutorial.add.form');
Route::post('/tutorial/added','Modules\Tutorial\TutorialController@insert')->name('tutorial.added');
Route::get('/tutorial/delete/{id}','Modules\Tutorial\TutorialController@delete')->name('tutorial.del');
Route::get('/tutorial/edit/{id}','Modules\Tutorial\TutorialController@edit_view')->name('tutorial.edit');
Route::post('/tutorial/update','Modules\Tutorial\TutorialController@update')->name('tutorial.update');
//Route::get('/tutorial/view/{id}','Modules\Tutorial\TutorialController@view')->name('tutorial.view');





//user achivment
Route::get('/achivement','Modules\SalaryController@list')->name('achivment.list');
Route::post('/achivement','Modules\SalaryController@list')->name('achivment.search');






// export
Route::get('/export-users','Modules\Dashboard\DashboardController@exportUser')->name('admin.export.users');
Route::get('/export-salary','Modules\Dashboard\DashboardController@exportSalary')->name('admin.export.salary');
// Report 
Route::get('/reports','Modules\Dashboard\DashboardController@showReport')->name('admin.manage.report');



//faq
Route::get('/faq','Modules\Faq\FaqManageController@faq_list')->name('faq.list');
Route::get('/faq/add','Modules\Faq\FaqManageController@add_form')->name('faq.add.form');
Route::post('/faq/insert','Modules\Faq\FaqManageController@insert_faq')->name('insert.faq');
Route::post('/faq/update','Modules\Faq\FaqManageController@update')->name('update.faq');
Route::get('/faq/delete/{id}','Modules\Faq\FaqManageController@dlt')->name('faq.dlt');



//picture part in faq controller
Route::get('/picture','Modules\Faq\FaqManageController@picture_list')->name('picture.list');
Route::get('/picture/add','Modules\Faq\FaqManageController@pic_add_form')->name('pic.add.form');
Route::post('/picture/insert','Modules\Faq\FaqManageController@insert_pic')->name('insert.pic');
Route::get('/picture/delete/{id}','Modules\Faq\FaqManageController@pic_dlt')->name('pic.dlt');





//admin change password
Route::get('/dashboard/change-password','Modules\Dashboard\DashboardController@admin_change_password_page')->name('admin.change.password');
Route::post('/dashboard/update-password','Modules\Dashboard\DashboardController@update')->name('admin.pass.update');



//services
Route::get('/service','Modules\Service\ServiceController@service_list')->name('service.list');
 Route::get('/service/add','Modules\Service\ServiceController@ServiceController')->name('service.add.form');
Route::post('/service/insert','Modules\Service\ServiceController@insert_ser')->name('insert.service');
Route::get('/service/delete/{id}','Modules\Service\ServiceController@ser_dlt')->name('service.dlt');


//offer latter
Route::get('/offer-latter','Modules\Dashboard\DashboardController@offer_list')->name('offer.list');
Route::post('/offer-latter/add','Modules\Dashboard\DashboardController@offer_add')->name('offer.add');
Route::get('/offer-latter/del/{id}','Modules\Dashboard\DashboardController@offer_del')->name('offer.del');




//banner part in faq controller
Route::get('/banner','Modules\Faq\FaqManageController@banner_list')->name('banner.list');
Route::get('/banner/add','Modules\Faq\FaqManageController@banner_add_form')->name('banner.add.form');
 Route::post('/banner/insert','Modules\Faq\FaqManageController@insert_banner')->name('insert.banner');
 Route::get('/banner/delete/{id}','Modules\Faq\FaqManageController@banner_dlt')->name('banner.dlt');
Route::get('/banner/active/{id}','Modules\Faq\FaqManageController@banner_active')->name('banner.active');



});