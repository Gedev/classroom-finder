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

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'HomeController@homepage')->name('index');
Route::get('/userAccount', 'HomeController@userAccount')->name('userAccount');

Route::group(['middleware', ['roleVerification']], function () {
    Route::get('/adminPanel', 'HomeController@adminPanel')
        ->name('adminPanel');
    Route::get('/attendance', 'HomeController@attendanceRecord')
        ->name('attendanceRecord');
    Route::resource('users', 'UserController');
    Route::resource('classrooms', 'ClassroomController');
    Route::resource('courses', 'CourseController');
    Route::get('send-mail','MailSend@mailsend');
});



