<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::view('/welcome', 'welcome')->withoutMiddleware('auth');
Route::get('/home', 'HomeController@homepage')->name('index');
Route::get('/userAccount', 'HomeController@userAccount')->name('userAccount');

Route::middleware('roleVerification')->group(function () {
    Route::get('/adminPanel', 'HomeController@adminPanel')
        ->name('adminPanel');
    Route::get('/attendance', 'HomeController@attendanceRecord')
        ->name('attendanceRecord');
    Route::post('make-attendance','AttendanceController@makeAttendance');
    Route::get('/getSection/{id}', 'AjaxController@index')->name('AjaxControllerIndex');
    Route::resource('adminPanel/users', 'UserController');
    Route::resource('adminPanel/classrooms', 'ClassroomController');
    Route::resource('adminPanel/courses', 'CourseController');
    Route::resource('adminPanel/sections', 'SectionController');
    Route::resource('adminPanel/categories', 'CategoryController');
    Route::get('send-mail','MailSend@mailsend');
    Route::get('adminPanel/permissions', 'HomeController@adminPanelPermissions')
        ->name('permissions');
});



