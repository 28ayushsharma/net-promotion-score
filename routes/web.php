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



Route::post('signup_save', 'UserController@save')->name('signup-save');
Route::post('login', 'UserController@login')->name('login');


Route::middleware(['admin'])->group(function (){
    Route::get('dashboard', 'UserController@index')->name('dashboard');
    Route::get('logout', 'UserController@logout')->name('logout');



    Route::resource('nps-forms', 'NpsFormsController');
    
    
    



});