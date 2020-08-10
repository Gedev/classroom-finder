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

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'HomeController@homepage')->name('index');
Route::get('/userAccount', 'HomeController@userAccount')->name('userAccount');

Route::get('/adminPanel', 'ClassroomsController@index')
    ->name('adminPanel')
    ->middleware('roleVerification');

Route::get('/attendance', 'HomeController@attendanceRecord')
    ->name('attendanceRecord')
    ->middleware('roleVerification');
