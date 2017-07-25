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

    Route::get('/', 'Frontend\PostsController@indexFrontend');
    Route::get('/show/{id}', 'Frontend\PostsController@show')->name('show');


    Auth::routes();

    Route::middleware(['auth'])->group(function() {
        Route::group(['namespace' => 'Frontend'], function() {
            Route::get('/home', 'HomeController@index')->name('home');
            Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
            Route::put('/profile/update', 'ProfileController@update')->name('profile.upda');

            Route::get('cate-post/list', 'CatePostsController@listData')->name('cate-post.list');
            Route::resource('cate-post', 'CatePostsController');

            Route::get('post/list', 'PostsController@listData')->name('post.list');
            Route::get('page/show/{id}', 'PostsController@show')->name('page.show');
            Route::resource('post', 'PostsController');
            Route::get('page', 'PostsController@indexFrontend')->name('page');
            Route::get('comment', 'CommentsController@store')->name('comment');
        });

        Route::middleware(['admin'])->group(function() {
            Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
                Route::get('/', 'AdminController@index');
                Route::get('user/list', 'UsersController@listData')->name('user.list'); // goi lai trang danh sach khi xoa bang ajax
                Route::get('user/trashed', 'UsersController@trashed')->name('user.trashed');
                Route::get('user/list_rashed', 'UsersController@list_rashedData')->name('user.list_rashed'); // goi lai trang danh sach khi xoa bang ajax
                Route::get('user/delete/{id}', 'UsersController@delete')->name('user.delete');
                Route::get('user/restore/{id}', 'UsersController@restore')->name('user.restore');
                Route::resource('user', 'UsersController');
            });
        });
    });
