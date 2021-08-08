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
Route::get('/search', 'SearchController@index');
Route::get('palody-image/{id}', 'Admin\BlogController@image')->middleware('auth');
Route::get('tag-image/{id}', 'Admin\TagController@image')->middleware('auth');
Route::get('artist-image/{id}', 'Admin\ArtistController@image')->middleware('auth');
//管理者用
Route::get('/admin', 'Admin\BlogController@index');

Auth::routes();

Route::group(['prefix' => 'admin'], function(){
    Route::get('blog/create', 'Admin\BlogController@add')->middleware('auth');
    Route::post('blog/create', 'Admin\BlogController@palodyCreate')->middleware('auth');
    Route::get('blog/tag/create', 'Admin\TagController@add')->middleware('auth');
    Route::post('blog/tag/create', 'Admin\TagController@create')->middleware('auth');
    Route::get('blog/artist/create', 'Admin\ArtistController@add')->middleware('auth');
    Route::post('blog/artist/create', 'Admin\ArtistController@create')->middleware('auth');
    
    Route::get('blog/edit', 'Admin\BlogController@edit')->middleware('auth');
    Route::post('blog/edit', 'Admin\BlogController@update')->middleware('auth');
    Route::get('blog/delete', 'Admin\BlogController@delete')->middleware('auth');
    
    
});
