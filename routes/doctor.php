<?php

use Illuminate\Support\Facades\Route;
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

Auth::routes(['register'=>false,'login'=>false]);
Route::post('admin/logout', 'Admin\AdminController@admin_logout')->name('logout') ;

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:doctor'],function (){
    Route::get('/login', 'AdminController@get_login')->name('doctor.login');
    Route::post('/logins', 'AdminController@add_login')->name('add.login');
    Route::get('/register', 'AdminController@get_register')->name('register');
    Route::post('/registers', 'AdminController@add_register')->name('add.register');

});
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:doctor'],function (){
    Route::get('index','DashboardController@index')->name('admin.dashboard');
    Route::resource('fields','FieldController');
    Route::resource('doctors','DoctorController');
    Route::get('doctors/change/status/{id}','DoctorController@change_status')->name('change.status');
    Route::resource('schedules','DoctorScheduleController')->except(['show','create','edit']);
    Route::get('schedule/change/status/{id}','DoctorScheduleController@change_status')->name('change.schedule.status');
    Route::resource('patients','PatientController')->except(['show','create','edit']);
    Route::resource('appointment','AppointmentController')->except(['show','create','edit']);
    Route::get('questions','AskController@index')->name('questions.show');
    Route::get('change/{id}','AskController@change_status')->name('change.status');
    Route::get('questions/delete/{id}','AskController@destroy')->name('questions.destroy');

    Route::get('meetings','AppointmentController@all_Meeting')->name('admin.meeting.all');
    Route::get('meeting/today','AppointmentController@meeting')->name('admin.meeting');
    Route::get('meeting/tomorrow','AppointmentController@meetingTomorrow')->name('admin.meeting.tomorrow');

});

Route::group(['namespace'=>'Doctor','prefix'=>'doctor','middleware'=>'auth:doctor'],function (){
    Route::get('index','DashboardController@index')->name('doctor.dashboard');
    Route::get('scheduler/calendar','MainDoctorController@SchedulerCalendar')->name('doctor.scheduler.calender');

    Route::resource('doctors/schedule','MainDoctorController');
    Route::get('schedule/day','MainDoctorController@get_schedule_day')->name('doctor.day.schedule');
    Route::get('schedule/weak','MainDoctorController@get_schedule_weak')->name('doctor.weak.schedule');
    Route::get('schedule/after/week','MainDoctorController@get_schedule_after_week')->name('doctor.after.week.schedule');
    Route::get('questions','MainDoctorController@get_answerAndQuestions')->name('doctor.question');
    Route::post('answer','MainDoctorController@answer')->name('doctor.answer');
    Route::get('profile','MainDoctorController@get_profile')->name('doctor.profile');
    Route::post('edit/profile','MainDoctorController@edit_profile')->name('doctor.profile.edit');
    Route::get('password','MainDoctorController@get_forget')->name('doctor.forget.password');
    Route::post('edit/password','MainDoctorController@change_password')->name('doctor.change.password');

    Route::get('meeting/today','MainDoctorController@meeting')->name('doctor.meeting');
    Route::get('meeting/tomorrow','MainDoctorController@meetingTomorrow')->name('doctor.meeting.tomorrow');

    Route::get('meeting/fullcalendar','MainDoctorController@fullcalendar')->name('doctor.meeting.all');


});



