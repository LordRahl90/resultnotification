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

//Route::group(['prefix'=>'admin'], function(){
//    Route::get('/login','Admin\Access\AccessController@loadLoginPage');
//
//    Route::get('/register','Admin\Access\AccessController@loadRegisterPage');
//
//    Route::get('/dashboard','Admin\Access\AccessController@loadDashboard');
//
//});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin/schools', ['as'=> 'admin.schools.index', 'uses' => 'Admin\SchoolController@index']);
Route::post('admin/schools', ['as'=> 'admin.schools.store', 'uses' => 'Admin\SchoolController@store']);
Route::get('admin/schools/create', ['as'=> 'admin.schools.create', 'uses' => 'Admin\SchoolController@create']);
Route::put('admin/schools/{schools}', ['as'=> 'admin.schools.update', 'uses' => 'Admin\SchoolController@update']);
Route::patch('admin/schools/{schools}', ['as'=> 'admin.schools.update', 'uses' => 'Admin\SchoolController@update']);
Route::delete('admin/schools/{schools}', ['as'=> 'admin.schools.destroy', 'uses' => 'Admin\SchoolController@destroy']);
Route::get('admin/schools/{schools}', ['as'=> 'admin.schools.show', 'uses' => 'Admin\SchoolController@show']);
Route::get('admin/schools/{schools}/edit', ['as'=> 'admin.schools.edit', 'uses' => 'Admin\SchoolController@edit']);


Route::get('admin/departments', ['as'=> 'admin.departments.index', 'uses' => 'Admin\DepartmentController@index']);
Route::post('admin/departments', ['as'=> 'admin.departments.store', 'uses' => 'Admin\DepartmentController@store']);
Route::get('admin/departments/create', ['as'=> 'admin.departments.create', 'uses' => 'Admin\DepartmentController@create']);
Route::put('admin/departments/{departments}', ['as'=> 'admin.departments.update', 'uses' => 'Admin\DepartmentController@update']);
Route::patch('admin/departments/{departments}', ['as'=> 'admin.departments.update', 'uses' => 'Admin\DepartmentController@update']);
Route::delete('admin/departments/{departments}', ['as'=> 'admin.departments.destroy', 'uses' => 'Admin\DepartmentController@destroy']);
Route::get('admin/departments/{departments}', ['as'=> 'admin.departments.show', 'uses' => 'Admin\DepartmentController@show']);
Route::get('admin/departments/{departments}/edit', ['as'=> 'admin.departments.edit', 'uses' => 'Admin\DepartmentController@edit']);


Route::get('admin/levels', ['as'=> 'admin.levels.index', 'uses' => 'Admin\LevelController@index']);
Route::post('admin/levels', ['as'=> 'admin.levels.store', 'uses' => 'Admin\LevelController@store']);
Route::get('admin/levels/create', ['as'=> 'admin.levels.create', 'uses' => 'Admin\LevelController@create']);
Route::put('admin/levels/{levels}', ['as'=> 'admin.levels.update', 'uses' => 'Admin\LevelController@update']);
Route::patch('admin/levels/{levels}', ['as'=> 'admin.levels.update', 'uses' => 'Admin\LevelController@update']);
Route::delete('admin/levels/{levels}', ['as'=> 'admin.levels.destroy', 'uses' => 'Admin\LevelController@destroy']);
Route::get('admin/levels/{levels}', ['as'=> 'admin.levels.show', 'uses' => 'Admin\LevelController@show']);
Route::get('admin/levels/{levels}/edit', ['as'=> 'admin.levels.edit', 'uses' => 'Admin\LevelController@edit']);



Route::get('admin/schoolSessions', ['as'=> 'admin.schoolSessions.index', 'uses' => 'Admin\SchoolSessionController@index']);
Route::post('admin/schoolSessions', ['as'=> 'admin.schoolSessions.store', 'uses' => 'Admin\SchoolSessionController@store']);
Route::get('admin/schoolSessions/create', ['as'=> 'admin.schoolSessions.create', 'uses' => 'Admin\SchoolSessionController@create']);
Route::put('admin/schoolSessions/{schoolSessions}', ['as'=> 'admin.schoolSessions.update', 'uses' => 'Admin\SchoolSessionController@update']);
Route::patch('admin/schoolSessions/{schoolSessions}', ['as'=> 'admin.schoolSessions.update', 'uses' => 'Admin\SchoolSessionController@update']);
Route::delete('admin/schoolSessions/{schoolSessions}', ['as'=> 'admin.schoolSessions.destroy', 'uses' => 'Admin\SchoolSessionController@destroy']);
Route::get('admin/schoolSessions/{schoolSessions}', ['as'=> 'admin.schoolSessions.show', 'uses' => 'Admin\SchoolSessionController@show']);
Route::get('admin/schoolSessions/{schoolSessions}/edit', ['as'=> 'admin.schoolSessions.edit', 'uses' => 'Admin\SchoolSessionController@edit']);


Route::get('admin/students', ['as'=> 'admin.students.index', 'uses' => 'Admin\StudentController@index']);
Route::post('admin/students', ['as'=> 'admin.students.store', 'uses' => 'Admin\StudentController@store']);
Route::get('admin/students/create', ['as'=> 'admin.students.create', 'uses' => 'Admin\StudentController@create']);
Route::put('admin/students/{students}', ['as'=> 'admin.students.update', 'uses' => 'Admin\StudentController@update']);
Route::patch('admin/students/{students}', ['as'=> 'admin.students.update', 'uses' => 'Admin\StudentController@update']);
Route::delete('admin/students/{students}', ['as'=> 'admin.students.destroy', 'uses' => 'Admin\StudentController@destroy']);
Route::get('admin/students/{students}', ['as'=> 'admin.students.show', 'uses' => 'Admin\StudentController@show']);
Route::get('admin/students/{students}/edit', ['as'=> 'admin.students.edit', 'uses' => 'Admin\StudentController@edit']);

Route::get('admin/upload/students',['as'=>'admin.students.show','uses'=>'Admin\StudentController@showUpload']);
Route::post('admin/upload/students',['as'=>'admin.students.upload','uses'=>'Admin\StudentController@upload']);


Route::get('admin/courses', ['as'=> 'admin.courses.index', 'uses' => 'Admin\CourseController@index']);
Route::post('admin/courses', ['as'=> 'admin.courses.store', 'uses' => 'Admin\CourseController@store']);
Route::get('admin/courses/create', ['as'=> 'admin.courses.create', 'uses' => 'Admin\CourseController@create']);
Route::put('admin/courses/{courses}', ['as'=> 'admin.courses.update', 'uses' => 'Admin\CourseController@update']);
Route::patch('admin/courses/{courses}', ['as'=> 'admin.courses.update', 'uses' => 'Admin\CourseController@update']);
Route::delete('admin/courses/{courses}', ['as'=> 'admin.courses.destroy', 'uses' => 'Admin\CourseController@destroy']);
Route::get('admin/courses/{courses}', ['as'=> 'admin.courses.show', 'uses' => 'Admin\CourseController@show']);
Route::get('admin/courses/{courses}/edit', ['as'=> 'admin.courses.edit', 'uses' => 'Admin\CourseController@edit']);


Route::get('admin/resultProcessings', ['as'=> 'admin.resultProcessings.index', 'uses' => 'Admin\ResultProcessingController@index']);
Route::post('admin/resultProcessings', ['as'=> 'admin.resultProcessings.store', 'uses' => 'Admin\ResultProcessingController@store']);
Route::get('admin/resultProcessings/create', ['as'=> 'admin.resultProcessings.create', 'uses' => 'Admin\ResultProcessingController@create']);
Route::put('admin/resultProcessings/{resultProcessings}', ['as'=> 'admin.resultProcessings.update', 'uses' => 'Admin\ResultProcessingController@update']);
Route::patch('admin/resultProcessings/{resultProcessings}', ['as'=> 'admin.resultProcessings.update', 'uses' => 'Admin\ResultProcessingController@update']);
Route::delete('admin/resultProcessings/{resultProcessings}', ['as'=> 'admin.resultProcessings.destroy', 'uses' => 'Admin\ResultProcessingController@destroy']);
Route::get('admin/resultProcessings/{resultProcessings}', ['as'=> 'admin.resultProcessings.show', 'uses' => 'Admin\ResultProcessingController@show']);
Route::get('admin/resultProcessings/{resultProcessings}/edit', ['as'=> 'admin.resultProcessings.edit', 'uses' => 'Admin\ResultProcessingController@edit']);

Route::get('admin/resultProcesssing/upload',['as'=>'admin.resultProcessings.show','uses'=>'Admin\ResultProcessingController@showUpload']);
Route::post('admin/resultProcesssing/upload',['as'=>'admin.resultProcessings.upload','uses'=>'Admin\ResultProcessingController@upload']);
Route::get('admin/resultProcesssing/process',['as'=>'admin.resultProcessings.process','uses'=>'Admin\ResultProcessingController@showProcess']);
Route::post('admin/resultProcesssing/process',['as'=>'admin.resultProcessings.process','uses'=>'Admin\ResultProcessingController@process']);



Route::get('admin/resultDetails', ['as'=> 'admin.resultDetails.index', 'uses' => 'Admin\ResultDetailController@index']);
Route::post('admin/resultDetails', ['as'=> 'admin.resultDetails.store', 'uses' => 'Admin\ResultDetailController@store']);
Route::get('admin/resultDetails/create', ['as'=> 'admin.resultDetails.create', 'uses' => 'Admin\ResultDetailController@create']);
Route::put('admin/resultDetails/{resultDetails}', ['as'=> 'admin.resultDetails.update', 'uses' => 'Admin\ResultDetailController@update']);
Route::patch('admin/resultDetails/{resultDetails}', ['as'=> 'admin.resultDetails.update', 'uses' => 'Admin\ResultDetailController@update']);
Route::delete('admin/resultDetails/{resultDetails}', ['as'=> 'admin.resultDetails.destroy', 'uses' => 'Admin\ResultDetailController@destroy']);
Route::get('admin/resultDetails/{resultDetails}', ['as'=> 'admin.resultDetails.show', 'uses' => 'Admin\ResultDetailController@show']);
Route::get('admin/resultDetails/{resultDetails}/edit', ['as'=> 'admin.resultDetails.edit', 'uses' => 'Admin\ResultDetailController@edit']);


Route::get('admin/users', ['as'=> 'admin.users.index', 'uses' => 'Admin\UserController@index']);
Route::post('admin/users', ['as'=> 'admin.users.store', 'uses' => 'Admin\UserController@store']);
Route::get('admin/users/create', ['as'=> 'admin.users.create', 'uses' => 'Admin\UserController@create']);
Route::put('admin/users/{users}', ['as'=> 'admin.users.update', 'uses' => 'Admin\UserController@update']);
Route::patch('admin/users/{users}', ['as'=> 'admin.users.update', 'uses' => 'Admin\UserController@update']);
Route::delete('admin/users/{users}', ['as'=> 'admin.users.destroy', 'uses' => 'Admin\UserController@destroy']);
Route::get('admin/users/{users}', ['as'=> 'admin.users.show', 'uses' => 'Admin\UserController@show']);
Route::get('admin/users/{users}/edit', ['as'=> 'admin.users.edit', 'uses' => 'Admin\UserController@edit']);


Route::get('admin/resultProcessings', ['as'=> 'admin.resultProcessings.index', 'uses' => 'Admin\ResultProcessingController@index']);
Route::post('admin/resultProcessings', ['as'=> 'admin.resultProcessings.store', 'uses' => 'Admin\ResultProcessingController@store']);
Route::get('admin/resultProcessings/create', ['as'=> 'admin.resultProcessings.create', 'uses' => 'Admin\ResultProcessingController@create']);
Route::put('admin/resultProcessings/{resultProcessings}', ['as'=> 'admin.resultProcessings.update', 'uses' => 'Admin\ResultProcessingController@update']);
Route::patch('admin/resultProcessings/{resultProcessings}', ['as'=> 'admin.resultProcessings.update', 'uses' => 'Admin\ResultProcessingController@update']);
Route::delete('admin/resultProcessings/{resultProcessings}', ['as'=> 'admin.resultProcessings.destroy', 'uses' => 'Admin\ResultProcessingController@destroy']);
Route::get('admin/resultProcessings/{resultProcessings}', ['as'=> 'admin.resultProcessings.show', 'uses' => 'Admin\ResultProcessingController@show']);
Route::get('admin/resultProcessings/{resultProcessings}/edit', ['as'=> 'admin.resultProcessings.edit', 'uses' => 'Admin\ResultProcessingController@edit']);


Route::get('admin/resultProcessings', ['as'=> 'admin.resultProcessings.index', 'uses' => 'Admin\ResultProcessingController@index']);
Route::post('admin/resultProcessings', ['as'=> 'admin.resultProcessings.store', 'uses' => 'Admin\ResultProcessingController@store']);
Route::get('admin/resultProcessings/create', ['as'=> 'admin.resultProcessings.create', 'uses' => 'Admin\ResultProcessingController@create']);
Route::put('admin/resultProcessings/{resultProcessings}', ['as'=> 'admin.resultProcessings.update', 'uses' => 'Admin\ResultProcessingController@update']);
Route::patch('admin/resultProcessings/{resultProcessings}', ['as'=> 'admin.resultProcessings.update', 'uses' => 'Admin\ResultProcessingController@update']);
Route::delete('admin/resultProcessings/{resultProcessings}', ['as'=> 'admin.resultProcessings.destroy', 'uses' => 'Admin\ResultProcessingController@destroy']);
Route::get('admin/resultProcessings/{resultProcessings}', ['as'=> 'admin.resultProcessings.show', 'uses' => 'Admin\ResultProcessingController@show']);
Route::get('admin/resultProcessings/{resultProcessings}/edit', ['as'=> 'admin.resultProcessings.edit', 'uses' => 'Admin\ResultProcessingController@edit']);


Route::get('admin/resultDetails', ['as'=> 'admin.resultDetails.index', 'uses' => 'Admin\ResultDetailController@index']);
Route::post('admin/resultDetails', ['as'=> 'admin.resultDetails.store', 'uses' => 'Admin\ResultDetailController@store']);
Route::get('admin/resultDetails/create', ['as'=> 'admin.resultDetails.create', 'uses' => 'Admin\ResultDetailController@create']);
Route::put('admin/resultDetails/{resultDetails}', ['as'=> 'admin.resultDetails.update', 'uses' => 'Admin\ResultDetailController@update']);
Route::patch('admin/resultDetails/{resultDetails}', ['as'=> 'admin.resultDetails.update', 'uses' => 'Admin\ResultDetailController@update']);
Route::delete('admin/resultDetails/{resultDetails}', ['as'=> 'admin.resultDetails.destroy', 'uses' => 'Admin\ResultDetailController@destroy']);
Route::get('admin/resultDetails/{resultDetails}', ['as'=> 'admin.resultDetails.show', 'uses' => 'Admin\ResultDetailController@show']);
Route::get('admin/resultDetails/{resultDetails}/edit', ['as'=> 'admin.resultDetails.edit', 'uses' => 'Admin\ResultDetailController@edit']);
