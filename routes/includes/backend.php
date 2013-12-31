<?php

/*
|--------------------------------------------------------------------------
| Web Back-End Routes
|--------------------------------------------------------------------------
*/

// Route::group(['prefix' => 'admin'], function () {




//     Route::get('/', function () {
//         return view('admin.index');
//     });

//     Route::resource('/post', 'PostController');
//     Route::resource('/user', 'UserController');
// });



Route::group(['prefix' => 'admin'], function () {

    Route::get('/login',  'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //admin Panel
    Route::group(['middleware' => 'auth:users'], function () {
        Route::get('/', function () {
            return view('admin.index');
        });
        Route::resource('/post', 'PostController');
        Route::resource('/user', 'UserController');
    });
});