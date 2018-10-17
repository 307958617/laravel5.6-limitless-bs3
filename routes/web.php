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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/departments', 'DepartmentsController@show_departments')->name('departments');
Route::get('/departments/get', 'DepartmentsController@get_departments')->name('get_departments');
Route::get('/departments/get/used', 'DepartmentsController@get_used_departments')->name('get_used_departments');
Route::post('/departments/add', 'DepartmentsController@add_department')->name('add_department');
Route::post('/departments/validate/name', 'DepartmentsController@validate_name')->name('validate_name');


//注册时发送邮件验证
Route::get('email/verify/{token}', 'EmailController@verify')->name('verify.email');
