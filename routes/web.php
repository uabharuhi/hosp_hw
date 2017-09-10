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
		return 'index page';
});



Route::get('/gg',function(){
  return 'gg 3:0';
});

Route::get('/doctor/login','Doctor\LoginController@showLoginForm' )->name("doctor.login");
Route::post('/doctor/login','Doctor\LoginController@login')->name("doctor.login");



Route::group( ['middleware' => 'auth:patient'], function() {
  Route::get('/patient/logout','Patient\LoginController@logout' );
  Route::get('/patient/home','Patient\PatientController@home' );
} );

Route::group( ['middleware' => 'auth:doctor'], function() {
  $group_name = 'doctor';
  Route::get('/doctor/logout','Doctor\LoginController@logout' )->name("$group_name.logout");
  Route::get('/doctor/home','Doctor\DoctorController@home')->name("$group_name.home");
  Route::get('/doctor/reservations','Doctor\DoctorController@reservations' )->name("$group_name.reservations");
});

Route::get('/patient/register','Patient\RegisterController@showRegistrationForm' );
Route::post('/patient/register','Patient\RegisterController@register' );

Route::get('/patient/login','Patient\LoginController@showLoginForm' );
Route::post('/patient/login','Patient\LoginController@login');





