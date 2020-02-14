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

// Main controllers for all user grades
use Illuminate\Support\Facades\Route;

// Archive routes
Route::get('courriers_admin/archive/{type}', 'ArchiveController@archive')->name('courriers_admin.archive');
Route::get('courriers_dv/archive/{type}', 'ArchiveController@archive')->name('courriers_dv.archive');
Route::get('courriers_dr/archive/{type}', 'ArchiveController@archive')->name('courriers_dr.archive');
Route::get('courriers_bo/archive/{type}', 'ArchiveController@archive')->name('courriers_bo.archive');

// Main routes to create, index, show, update, destroy...
Route::resource('courriers_admin', 'ADMINCourrierController');
Route::resource('courriers_dv', 'DVCourrierController');
Route::resource('courriers_bo', 'BOCourrierController');
Route::resource('courriers_dr', 'DRCourrierController');
Route::resource('courriers_OUT', 'OutCourrierController');

// Login route
Route::get('login', 'LoginProcessController@login')->name('login');

// a post method to check if the user infos are good to go or not.
Route::post('loginCheck', 'LoginProcessController@loginCheck')->name('loginCheck');

// Logout route to forget user token and get to login page
Route::get('logout', 'LoginProcessController@logout')->name('logout');

// Home Route
Route::get('/', 'LoginProcessController@login')->name('Home');

// Cloture routes
Route::get('courriers_admin/{id}', 'ADMINCourrierController@cloture')->name('courriers_admin.cloture');
Route::get('courriers_dr/{id}', 'DRCourrierController@cloture')->name('courriers_dr.cloture');

// Files upload routes
Route::get('upload', 'UploadController@uploadForm')->name('uploadForm');
Route::post('upload', 'UploadController@uploadSubmit')->name('upload');

// Files download route
Route::get('download/{filename}', 'DownloadController@download')->name('download/');
