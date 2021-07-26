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

Auth::routes();

//Route::get('/', 'HomeController@index')->name('landing.page');

 Route::group(['middleware'=>'auth'],function(){
  Route::get('/home','Frontend\Modules\Dashboard\DashboardController@home')->name('dashboard.home');

 });

