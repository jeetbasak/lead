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

Route::get('/', function () {
     return view('welcome');
});

 Route::get('get-state','Frontend\Modules\Dashboard\DashboardController@getstate')->name('dashboard.get.state');
  Route::post('register-secound-step','Frontend\Modules\Dashboard\DashboardController@reg_one')->name('register.one');

  Route::post('register-third-step','Frontend\Modules\Dashboard\DashboardController@reg_two')->name('register.two');

 Route::post('verification','Frontend\Modules\Dashboard\DashboardController@verification')->name('verification.reg');


 Route::get('register-second-step/{id}','Frontend\Modules\Dashboard\DashboardController@reg_2nd_page')->name('go.back');

  Route::post('register-thired-step','Frontend\Modules\Dashboard\DashboardController@update')->name('go.back.upd');

   Route::get('register-reffer/{email}/{id}','Frontend\Modules\Dashboard\DashboardController@reffer_reg')->name('register.reffer');

Auth::routes();

//Route::get('/', 'HomeController@index')->name('landing.page');

 Route::group(['middleware'=>'auth'],function(){
  Route::get('/home','Frontend\Modules\Dashboard\DashboardController@home')->name('dashboard.home');

  //target
  Route::get('/target','Frontend\Modules\MyTarget\MyTargetController@target_list')->name('my.target');
  Route::get('/target/future','Frontend\Modules\MyTarget\MyTargetController@future_target_list')->name('my.target.future');

  Route::get('/target/past','Frontend\Modules\MyTarget\MyTargetController@past_target_list')->name('my.target.past');
  Route::get('/reffer','Frontend\Modules\Share\ShareController@share')->name('my.share');



  //lead
   Route::get('/lead','Frontend\Modules\MyLead\MyLeadController@lead_list')->name('my.lead');
   Route::post('/lead/change-status','Frontend\Modules\MyLead\MyLeadController@change_status')->name('change.lead.status');



   //tutorial
   Route::get('/tutorial','Frontend\Modules\Tutorial\MyTutorialController@list')->name('my.tutorial');


  // profile 
  Route::get('/profile','Frontend\Modules\MyProfile\MyProfileController@index')->name('user.my.profile');
  Route::post('/profile/update-profile','Frontend\Modules\MyProfile\MyProfileController@updateProfile')->name('user.my.profile-edit');





  //salary
 Route::get('/salary','Frontend\Modules\MySalary\MySalaryController@my_salary_list')->name('my.salary');



//faq
 Route::get('/faq','Frontend\Modules\Faq\FaqController@faq_list')->name('my.faq.list');


 //notification
Route::get('/notification','Frontend\Modules\MyProfile\MyProfileController@notification_list')->name('my.notification');

 });

