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

 Route::resource('crud', 'CRUDController');
 Route::get('destroy/{id}', 'CRUDController@destroy');
 //Route::get('destroy/{id}', 'TeacherController@destroy');
 //Route::get('edit/{id}', 'TeacherController@edit');
 Route::resource('teacher', 'TeacherController');
//Route::resource('student', 'StudentController');
