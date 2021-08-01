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
//ユーザー用
Route::get('/', 'MemberController@index');

//管理者用
Route::get('/admin', 'Admin\BlogController@index');

Auth::routes();

Route::group(['prefix' => 'admin'], function(){
    Route::get('blog/create', 'Admin\BlogController@add')->middleware('auth');
    Route::post('blog/create', 'Admin\BlogController@create')->middleware('auth');
    Route::get('blog/edit', 'Admin\BlogController@edit')->middleware('auth');
    Route::post('blog/edit', 'Admin\BlogController@update')->middleware('auth');
    Route::get('blog/delete', 'Admin\BlogController@delete')->middleware('auth');
});
