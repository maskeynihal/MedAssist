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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(
    [
        'namespace' => 'Admin\Doctor',
        'prefix' => 'admin/doctor',
    ],
    function(){
        Route::get('/add', 'DoctorController@index')->name('doctor.add.index');
        Route::post('/add', 'DoctorController@addDoctor')->name('doctor.add');
        Route::get('/show', 'DoctorController@showDoctor')->name('show.all.doctor');
        Route::get('/{username}','DoctorController@showProfile')->name('show.single.profile.doctor');
        // Route::get('/{username}/add-schedule','DoctorController@addScheduleForm')->name('show.add.schedule.form');
        Route::post('/{username}/add-schedule','DoctorController@addScheduleForm')->name('show.add.schedule.form');
        Route::post('/{username}/add-schedule/add','DoctorController@addSchedule')->name('schedule.add');
    }
);
