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
Route::get('signUp', 'UserController@signUp');
Route::get('signIn', 'UserController@signIn');
Route::get('users', 'UserController@lists');
Route::get('user_del', 'UserController@delete');
Route::get('user_edit', 'UserController@edit');
Route::get('user_info', 'UserController@info');
Route::get('check_email', 'UserController@email');
Route::get('send_mail', 'UserController@sendMail');