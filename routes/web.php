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
/*用户相关操作*/
Route::get('signUp', 'UserController@signUp'); //注册
Route::get('signIn', 'UserController@signIn'); //登陆
Route::get('users', 'UserController@lists'); //获取用户表数据，每页10条数据
Route::get('user/delete/{id}', 'UserController@delete'); //删除指定id的用户
Route::get('user/edit/{id}', 'UserController@edit'); //修改指定id的用户
Route::get('user/{id}', 'UserController@info'); //获取指定id的用户信息
Route::get('user/check/{name}/{value}', 'UserController@check'); //验证name=value的数据是否存在
/*项目相关操作*/
Route::get('projects', 'ProjectController@lists');
Route::get('projects/add', 'ProjectController@add');
Route::get('projects/edit/{id}', 'ProjectController@edit');
Route::get('projects/{id}', 'ProjectController@info');
Route::get('projects/delete/{id}', 'ProjectController@delete');
/*文章相关操作*/
Route::get('articles', 'ArticleController@lists');
Route::get('articles/add', 'ArticleController@add');
Route::get('articles/edit/{id}', 'ArticleController@edit');
Route::get('articles/{id}', 'ArticleController@info');
Route::get('articles/delete/{id}', 'ArticleController@delete');