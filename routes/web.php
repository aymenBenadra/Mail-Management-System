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

Route::resource('courriers', 'CourrierController');


Route::get('login','LoginProcessController@login')->name('login');

// a post method to check if the user infos are good to go or not.
Route::post('loginCheck', 'LoginProcessController@loginCheck')->name('loginCheck');

// Logout route to forget user token and get to login page
Route::get ('logout', 'LoginProcessController@logout')->name('logout');
