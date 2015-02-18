<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'PagesController@getHome');
Route::get('home', 'PagesController@getHome');
Route::get('quiz', 'PagesController@getQuiz');

Route::group(array('before' => 'guest'), function () {
    Route::group(array('before' => 'csrf'), function () {
        Route::post('login', 'AccountController@doLogin');
        Route::post('register', 'AccountController@store');
        Route::post('login/forgotPassword', 'AccountController@doForgotPassword');
    });

    Route::get('register', 'AccountController@getRegister');
    Route::get('login', 'AccountController@getLogin');
    Route::get('login/forgotPassword', 'AccountController@getForgotPassword');
});

Entrust::routeNeedsRole('owner', 'Owner');
Route::get('owner', 'OwnerController@getDashboard');


//

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
//

