<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

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


Route::group(['namespace'=>'Patient','prefix'=>'patient','middleware'=>'guest:web'],function (){
    Route::get('/login', 'AuthController@get_patient_login')->name('patient.login');
    Route::post('/logins', 'AuthController@add_patient_login')->name('add.patient.login');
    Route::get('/register','AuthController@register')->name('patient.register');
    Route::post('/registers', 'AuthController@add_patient')->name('add.patient');

});
    Route::group(['namespace'=>'Patient','prefix'=>'patient'],function (){
        Route::get('/logout', 'AuthController@logout_patient')->name('patient.out');
        Route::get('/fields', 'FieldController@index')->name('patient.field');
        Route::get('/fields/{id}', 'FieldController@show')->name('patient.field.show');
        Route::get('/doctors', 'DoctorController@show')->name('patient.doctor.show');
        Route::get('/doctors/{id}', 'DoctorController@profile')->name('patient.doctor.profile');
        Route::get('/doctors/schedule/{id}', 'DoctorController@schedule')->name('patient.doctor.schedule');

    });
Route::group(['namespace'=>'Patient','prefix'=>'patient','middleware'=>'auth:web'],function (){
    Route::post('/fields/question/{id}', 'FieldController@question')->name('patient.field.question');
    Route::get('/book/appointment/{id}', 'DoctorController@get_checkout')->name('patient.book.master');
    Route::post('/book/master', 'DoctorController@get_master')->name('patient.book.master.pay');
    Route::get('thanks','DoctorController@thanks')->name('patient.thanks');
    Route::post('/make/appointment','DoctorController@appointment')->name('patient.appointment');
    Route::get('/meeting','MainPatientController@meeting')->name('patient.meeting');
    Route::get('/ask_answer','MainPatientController@ask_answer')->name('patient.ask_answer');

    //zoom integration

    // Get list of meetings.
    Route::get('/meetings', 'Zoom\MeetingController@list');

// Create meeting room using topic, agenda, start_time.
    Route::post('/meetings', 'Zoom\MeetingController@create');

// Get information of the meeting room by ID.
    Route::get('/meetings/{id}', 'Zoom\MeetingController@get')->where('id', '[0-9]+');
    Route::patch('/meetings/{id}', 'Zoom\MeetingController@update')->where('id', '[0-9]+');
    Route::delete('/meetings/{id}', 'Zoom\MeetingController@delete')->where('id', '[0-9]+');

});



Auth::routes(['register'=>false,'login'=>false]);

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('patient/home', 'Patient\MainPatientController@get_home')->name('patient.home');

Route::get('test',function (){

    $nowTimeDate = Carbon::now();
  dd($newTime = Carbon::now()->subMinute(30));
});
