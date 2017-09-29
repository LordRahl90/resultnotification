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

Route::group(['prefix'=>'admin'], function(){
    Route::get('/login','Admin\Access\AccessController@loadLoginPage');

    Route::get('/register','Admin\Access\AccessController@loadRegisterPage');

    Route::get('/dashboard','Admin\Access\AccessController@loadDashboard');

});