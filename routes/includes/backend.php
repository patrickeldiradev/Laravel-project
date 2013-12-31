<?php

/*
|--------------------------------------------------------------------------
| Web Back-End Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin'], function() {


    

    Route::get('/', function() {
        return view('admin.index');
    });

    Route::resource('/post', 'PostController');





});
