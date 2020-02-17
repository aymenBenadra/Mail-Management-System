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

/**
 * Routes to get the archived courriers for each user Role and for each type of courrier [IN/OUT].
 *
 * @var string type
 */
Route::get('courriers_admin/archive', 'ArchiveController@archive')->name('courriers_admin.archive');
Route::get('courriers_dv/archive', 'ArchiveController@archive')->name('courriers_dv.archive');
Route::get('courriers_dr/archive', 'ArchiveController@archive')->name('courriers_dr.archive');
Route::get('courriers_bo/archive', 'ArchiveController@archive')->name('courriers_bo.archive');

/**
 * Main routes to Create, Read, Update, and Destroy the courriers for each user Role
 */
Route::resource('courriers_admin', 'ADMINCourrierController');
Route::resource('courriers_dv', 'DVCourrierController');
Route::resource('courriers_bo', 'BOCourrierController');
Route::resource('courriers_dr', 'DRCourrierController');
Route::resource('courriers_OUT', 'OutCourrierController');

/**
 * Routes to manage Login and Logout from the session.
*/
Route::get('login', 'LoginProcessController@login')->name('login');
Route::post('loginCheck', 'LoginProcessController@loginCheck')->name('loginCheck');
Route::get('logout', 'LoginProcessController@logout')->name('logout');

/**
 * The main Route to manage the newcomers and redirections to the root directory.
*/
Route::get('/', 'LoginProcessController@login')->name('Home');

/**
 * Routes to manage courriers cloturing requests.
*/
Route::get('courriers_admin/{id}', 'ADMINCourrierController@cloture')->name('courriers_admin.cloture');
Route::get('courriers_dr/{id}', 'DRCourrierController@cloture')->name('courriers_dr.cloture');

/**
 * Routes to manage attachments uploading and Upload form requests.
*/
Route::get('upload', 'UploadController@uploadForm')->name('uploadForm');
Route::post('upload', 'UploadController@uploadSubmit')->name('upload');

/**
 * Route that manages attachments Download requests.
*/
Route::get('download/{filepath}/{filename}', 'DownloadController@download')->name('download/');
