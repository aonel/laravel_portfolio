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

//ログイン前のトップページ
Route::get('/', 'TopController@index')->name('tops.index');

Route::get('tops/{id}/show', 'TopController@show')->name('tops.show');

Auth::routes();



//ログイン後トップページ
Route::group(['middleware' => 'auth'], function () {

    Route::get('/posts/exhibitions', 'PostController@exhibitions')->name('posts.exhibitions');

    Route::resource('posts', 'PostController');

    Route::get('/posts/{post}/edit_image', 'PostController@editImage')->name('posts.edit_image');

    Route::patch('/posts/{post}/edit_image', 'PostController@updateImage')->name('posts.update_image');

    // 画像2
    Route::get('/posts/{post}/edit_image_second', 'PostController@editImageSecond')->name('posts.edit_image_second');

    Route::patch('/posts/{post}/edit_image_second', 'PostController@updateImageSecond')->name('posts.update_image_second');

    // ユーザープロフィール

    Route::get('/users', 'UserController@index')->name('users.index');

    Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::patch('/users/{id}', 'UserController@update')->name('users.update');

    Route::get('/users/{id}/edit_image', 'UserController@editImage')->name('users.edit_image');
    Route::patch('/users/{id}/edit_image', 'UserController@updateImage')->name('users.update_image');

    // いいね機能
    Route::resource('likes', 'LikeController')->only([
        'index', 'store', 'destroy'
    ]);
    Route::patch('/posts/{post}/toggle_like', 'PostController@toggleLike')->name('posts.toggle_like');

    // リダイレクト先をいいね一覧にも設定
    Route::patch('/likes/{post}/toggle_like', 'LikeController@toggleLike')->name('likes.toggle_like');
});
