<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('admin/schools', 'Admin\SchoolAPIController@index');
Route::post('admin/schools', 'Admin\SchoolAPIController@store');
Route::get('admin/schools/{schools}', 'Admin\SchoolAPIController@show');
Route::put('admin/schools/{schools}', 'Admin\SchoolAPIController@update');
Route::patch('admin/schools/{schools}', 'Admin\SchoolAPIController@update');
Route::delete('admin/schools{schools}', 'Admin\SchoolAPIController@destroy');

Route::get('admin/schools', 'Admin\SchoolAPIController@index');
Route::post('admin/schools', 'Admin\SchoolAPIController@store');
Route::get('admin/schools/{schools}', 'Admin\SchoolAPIController@show');
Route::put('admin/schools/{schools}', 'Admin\SchoolAPIController@update');
Route::patch('admin/schools/{schools}', 'Admin\SchoolAPIController@update');
Route::delete('admin/schools{schools}', 'Admin\SchoolAPIController@destroy');

Route::get('admin/schools', 'Admin\SchoolAPIController@index');
Route::post('admin/schools', 'Admin\SchoolAPIController@store');
Route::get('admin/schools/{schools}', 'Admin\SchoolAPIController@show');
Route::put('admin/schools/{schools}', 'Admin\SchoolAPIController@update');
Route::patch('admin/schools/{schools}', 'Admin\SchoolAPIController@update');
Route::delete('admin/schools{schools}', 'Admin\SchoolAPIController@destroy');

Route::get('admin/schools', 'Admin\SchoolAPIController@index');
Route::post('admin/schools', 'Admin\SchoolAPIController@store');
Route::get('admin/schools/{schools}', 'Admin\SchoolAPIController@show');
Route::put('admin/schools/{schools}', 'Admin\SchoolAPIController@update');
Route::patch('admin/schools/{schools}', 'Admin\SchoolAPIController@update');
Route::delete('admin/schools{schools}', 'Admin\SchoolAPIController@destroy');

Route::get('admin/departments', 'Admin\DepartmentAPIController@index');
Route::post('admin/departments', 'Admin\DepartmentAPIController@store');
Route::get('admin/departments/{departments}', 'Admin\DepartmentAPIController@show');
Route::put('admin/departments/{departments}', 'Admin\DepartmentAPIController@update');
Route::patch('admin/departments/{departments}', 'Admin\DepartmentAPIController@update');
Route::delete('admin/departments{departments}', 'Admin\DepartmentAPIController@destroy');

Route::get('admin/levels', 'Admin\LevelAPIController@index');
Route::post('admin/levels', 'Admin\LevelAPIController@store');
Route::get('admin/levels/{levels}', 'Admin\LevelAPIController@show');
Route::put('admin/levels/{levels}', 'Admin\LevelAPIController@update');
Route::patch('admin/levels/{levels}', 'Admin\LevelAPIController@update');
Route::delete('admin/levels{levels}', 'Admin\LevelAPIController@destroy');

Route::get('admin/students', 'Admin\StudentAPIController@index');
Route::post('admin/students', 'Admin\StudentAPIController@store');
Route::get('admin/students/{students}', 'Admin\StudentAPIController@show');
Route::put('admin/students/{students}', 'Admin\StudentAPIController@update');
Route::patch('admin/students/{students}', 'Admin\StudentAPIController@update');
Route::delete('admin/students{students}', 'Admin\StudentAPIController@destroy');

Route::get('admin/school_sessions', 'Admin\SchoolSessionAPIController@index');
Route::post('admin/school_sessions', 'Admin\SchoolSessionAPIController@store');
Route::get('admin/school_sessions/{school_sessions}', 'Admin\SchoolSessionAPIController@show');
Route::put('admin/school_sessions/{school_sessions}', 'Admin\SchoolSessionAPIController@update');
Route::patch('admin/school_sessions/{school_sessions}', 'Admin\SchoolSessionAPIController@update');
Route::delete('admin/school_sessions{school_sessions}', 'Admin\SchoolSessionAPIController@destroy');

Route::get('admin/students', 'Admin\StudentAPIController@index');
Route::post('admin/students', 'Admin\StudentAPIController@store');
Route::get('admin/students/{students}', 'Admin\StudentAPIController@show');
Route::put('admin/students/{students}', 'Admin\StudentAPIController@update');
Route::patch('admin/students/{students}', 'Admin\StudentAPIController@update');
Route::delete('admin/students{students}', 'Admin\StudentAPIController@destroy');

Route::get('admin/courses', 'Admin\CourseAPIController@index');
Route::post('admin/courses', 'Admin\CourseAPIController@store');
Route::get('admin/courses/{courses}', 'Admin\CourseAPIController@show');
Route::put('admin/courses/{courses}', 'Admin\CourseAPIController@update');
Route::patch('admin/courses/{courses}', 'Admin\CourseAPIController@update');
Route::delete('admin/courses{courses}', 'Admin\CourseAPIController@destroy');

Route::get('admin/result_processings', 'Admin\ResultProcessingAPIController@index');
Route::post('admin/result_processings', 'Admin\ResultProcessingAPIController@store');
Route::get('admin/result_processings/{result_processings}', 'Admin\ResultProcessingAPIController@show');
Route::put('admin/result_processings/{result_processings}', 'Admin\ResultProcessingAPIController@update');
Route::patch('admin/result_processings/{result_processings}', 'Admin\ResultProcessingAPIController@update');
Route::delete('admin/result_processings{result_processings}', 'Admin\ResultProcessingAPIController@destroy');

Route::get('admin/result_details', 'Admin\ResultDetailAPIController@index');
Route::post('admin/result_details', 'Admin\ResultDetailAPIController@store');
Route::get('admin/result_details/{result_details}', 'Admin\ResultDetailAPIController@show');
Route::put('admin/result_details/{result_details}', 'Admin\ResultDetailAPIController@update');
Route::patch('admin/result_details/{result_details}', 'Admin\ResultDetailAPIController@update');
Route::delete('admin/result_details{result_details}', 'Admin\ResultDetailAPIController@destroy');

Route::get('admin/users', 'Admin\UserAPIController@index');
Route::post('admin/users', 'Admin\UserAPIController@store');
Route::get('admin/users/{users}', 'Admin\UserAPIController@show');
Route::put('admin/users/{users}', 'Admin\UserAPIController@update');
Route::patch('admin/users/{users}', 'Admin\UserAPIController@update');
Route::delete('admin/users{users}', 'Admin\UserAPIController@destroy');

Route::get('admin/users', 'Admin\UserAPIController@index');
Route::post('admin/users', 'Admin\UserAPIController@store');
Route::get('admin/users/{users}', 'Admin\UserAPIController@show');
Route::put('admin/users/{users}', 'Admin\UserAPIController@update');
Route::patch('admin/users/{users}', 'Admin\UserAPIController@update');
Route::delete('admin/users{users}', 'Admin\UserAPIController@destroy');

Route::get('admin/users', 'Admin\UserAPIController@index');
Route::post('admin/users', 'Admin\UserAPIController@store');
Route::get('admin/users/{users}', 'Admin\UserAPIController@show');
Route::put('admin/users/{users}', 'Admin\UserAPIController@update');
Route::patch('admin/users/{users}', 'Admin\UserAPIController@update');
Route::delete('admin/users{users}', 'Admin\UserAPIController@destroy');

Route::get('admin/result_processings', 'Admin\ResultProcessingAPIController@index');
Route::post('admin/result_processings', 'Admin\ResultProcessingAPIController@store');
Route::get('admin/result_processings/{result_processings}', 'Admin\ResultProcessingAPIController@show');
Route::put('admin/result_processings/{result_processings}', 'Admin\ResultProcessingAPIController@update');
Route::patch('admin/result_processings/{result_processings}', 'Admin\ResultProcessingAPIController@update');
Route::delete('admin/result_processings{result_processings}', 'Admin\ResultProcessingAPIController@destroy');

Route::get('admin/result_processings', 'Admin\ResultProcessingAPIController@index');
Route::post('admin/result_processings', 'Admin\ResultProcessingAPIController@store');
Route::get('admin/result_processings/{result_processings}', 'Admin\ResultProcessingAPIController@show');
Route::put('admin/result_processings/{result_processings}', 'Admin\ResultProcessingAPIController@update');
Route::patch('admin/result_processings/{result_processings}', 'Admin\ResultProcessingAPIController@update');
Route::delete('admin/result_processings{result_processings}', 'Admin\ResultProcessingAPIController@destroy');

Route::get('admin/result_details', 'Admin\ResultDetailAPIController@index');
Route::post('admin/result_details', 'Admin\ResultDetailAPIController@store');
Route::get('admin/result_details/{result_details}', 'Admin\ResultDetailAPIController@show');
Route::put('admin/result_details/{result_details}', 'Admin\ResultDetailAPIController@update');
Route::patch('admin/result_details/{result_details}', 'Admin\ResultDetailAPIController@update');
Route::delete('admin/result_details{result_details}', 'Admin\ResultDetailAPIController@destroy');