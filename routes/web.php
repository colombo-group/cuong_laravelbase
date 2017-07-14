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

    Route::middleware(['auth'])->group(function() {
        Route::group(['namespace' => 'Frontend'], function() {
            Route::get('/home', 'HomeController@index')->name('home');
            Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
            Route::post('/profile/update', 'ProfileController@update')->name('profile.upda');
        });

        Route::middleware(['admin'])->group(function() {
            Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
                Route::get('/', 'AdminController@index');
                Route::get('user/list', 'UsersController@index')->name('user.list');
            });
        });
    });
