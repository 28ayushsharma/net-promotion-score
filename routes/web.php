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
    return view('login');
})->name('/');
Route::get('sign-up', function () {
    return view('sign-up');
})->name('sign-up');


Route::get('my-widget',function(){
    return view('mywidget');
});

Route::post('signup_save', 'UserController@save')->name('signup-save');
Route::post('login', 'UserController@login')->name('login');

Route::get('nps/{survey_token}', 'EmailNpsController@emailedNps')->name('code_nps');
Route::any('nps_collection', 'EmailNpsController@saveSurvey')->name('save_survey');

Route::middleware(['admin'])->group(function (){
    Route::get('dashboard', 'UserController@index')->name('dashboard');
    Route::get('logout', 'UserController@logout')->name('logout');



    Route::resource('nps-forms', 'NpsFormsController');
    Route::resource('email-nps', 'EmailNpsController');
    Route::resource('nps-key', 'NpsKeyController');
    
});