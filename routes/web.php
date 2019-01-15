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
Route::post('/system_code/add/gender', 'SystemCodeController@add_gender')->name('add_gender');
Route::post('/system_code/validate/gender', 'SystemCodeController@validate_gender')->name('validate_gender');
Route::get('/system_code/get/gender/used', 'SystemCodeController@get_used_gender')->name('get_used_gender');

Route::get('/system_code/get/title', 'SystemCodeController@get_title')->name('get_title');
Route::post('/system_code/add/title', 'SystemCodeController@add_title')->name('add_title');
Route::post('/system_code/validate/title', 'SystemCodeController@validate_title')->name('validate_title');
Route::get('/system_code/get/title/used', 'SystemCodeController@get_used_title')->name('get_used_title');

Route::get('/system_code/get/post', 'SystemCodeController@get_post')->name('get_post');
Route::post('/system_code/add/post', 'SystemCodeController@add_post')->name('add_post');
Route::post('/system_code/validate/post', 'SystemCodeController@validate_post')->name('validate_post');
Route::get('/system_code/get/post/used', 'SystemCodeController@get_used_post')->name('get_used_post');

Route::get('/system_code/get/education', 'SystemCodeController@get_education')->name('get_education');
Route::post('/system_code/add/education', 'SystemCodeController@add_education')->name('add_education');
Route::post('/system_code/validate/education', 'SystemCodeController@validate_education')->name('validate_education');
Route::get('/system_code/get/education/used', 'SystemCodeController@get_used_education')->name('get_used_education');


//注册时发送邮件验证
Route::get('email/verify/{token}', 'EmailController@verify')->name('verify.email');
