<?php

/*
|--------------------------------------------------------------------------
| Web Back-End Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => 'admin'], function () {

    Route::get('/login',  'Auth\UserLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\UserLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\UserLoginController@logout')->name('admin.logout');

    //admin Panel
    Route::group(['middleware' => 'auth:users'] , function() {

        Route::get('/', function () {
            return view('admin.index');
        })->name('admin.dashboard');
        
        Route::resource('/post', 'PostController');
        Route::resource('/user', 'UserController');
        
    });
    

});