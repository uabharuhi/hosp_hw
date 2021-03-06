<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/patient/login', 'Patient\ApiAuthController@login');
Route::post('/patient/register','Patient\ApiRegisterController@register');


Route::group([
    'middleware' => 'auth:api_patient',
], function () {
    // Authentication Routes...
    Route::get('/patient/logout', 'Patient\ApiAuthController@logout');

    Route::get('/patient/home', 'Patient\ApiAuthController@home');
    Route::post('/patient/reserve' , 'Reservation\ReController@reserve');


    Route::get('/patient/myinfo', 'Reservation\ReController@myinfo');
    Route::get('/patient/resvs' , 'Reservation\ReController@resvs');
});
