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
Route::post('/departments/get/used', 'DepartmentsController@get_used_departments')->name('get_used_departments');
Route::post('/departments/add', 'DepartmentsController@add_department')->name('add_department');
Route::post('/departments/edit', 'DepartmentsController@edit_department')->name('edit_department');
Route::post('/departments/validate/name', 'DepartmentsController@validate_name')->name('validate_name');

Route::get('/users', 'UsersController@show_users')->name('users');
Route::get('/users/get', 'UsersController@get_users')->name('get_users');

Route::get('/system_code', 'SystemCodeController@show_system_code')->name('show_system_code');
Route::get('/system_code/get/gender', 'SystemCodeController@get_gender')->name('get_gender');
Route::get('/system_code/add/gender', 'SystemCodeController@add_gender')->name('add_gender');
Route::post('/system_code/validate/gender', 'SystemCodeController@validate_gender')->name('validate_gender');

Route::get('/system_code/get/gender/used', 'SystemCodeController@get_used_gender')->name('get_used_gender');



//注册时发送邮件验证
Route::get('email/verify/{token}', 'EmailController@verify')->name('verify.email');
