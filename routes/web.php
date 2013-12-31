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

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */



/* Check language */
$locale = Request::segment(1);
if (in_array($locale, Config::get('app.available_locales'))) {
    \App::setLocale($locale);
} else {
    $locale = null;
}


/*  Routes group  */
Route::group( [ 'prefix' => $locale, 'middleware' => ['locale'] ] , function() use ($locale) {

    /* Back-End Routes */
    require __DIR__.'/includes/backend.php';

    /* Front-End Routes */
    require __DIR__.'/includes/frontend.php';

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
