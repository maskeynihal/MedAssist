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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-doctors', 'Api\Doctor\DoctorController@getDoctor')->name('get.doctor');


Route::get('get-doctors', 'Api\Doctor\DoctorController@getDoctors')->name('get.doctors');
Route::get('get-available-date', 'Api\Doctor\DoctorController@getAvailableDate')->name('get.available.date');
Route::get('get-available-time', 'Api\Doctor\DoctorController@getAvailableTime')->name('get.available.time');

Route::get('test', 'Api\Doctor\DoctorController@test');