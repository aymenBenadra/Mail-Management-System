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
Route::resource('courriers_admin', 'ADMINCourrierController');
Route::resource('courriers_dv', 'DVCourrierController');
Route::resource('courriers_bo', 'BOCourrierController');
Route::resource('courriers_dr', 'DRCourrierController');

// Login route
Route::get('login','LoginProcessController@login')->name('login');

// a post method to check if the user infos are good to go or not.
Route::post('loginCheck', 'LoginProcessController@loginCheck')->name('loginCheck');

// Logout route to forget user token and get to login page
Route::get ('logout', 'LoginProcessController@logout')->name('logout');

// Files upload routes
Route::get('upload', 'UploadController@uploadForm')->name('uploadForm');
Route::post('upload', 'UploadController@uploadSubmit')->name('upload');

// Files download route
Route::get('download/{filename}', 'DownloadController@download')->name('download/');
