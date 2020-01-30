<?php

Route::group(['middleware' => 'auth'], function (){

    Route::get('/', function () {
        return view('home');
    });
});

Auth::routes([
    'register' => false,
    'verify' => false
]);




//Admin route
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Auth::routes(['register' => false]);
});

Route::group(['middleware' => 'auth', 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', function () {
        return view('admin.home');
    });

    Route::resource('users', 'UserController');

    Route::get('password/change', 'UserController@changePassword')->name('password.change');
    Route::post('password/change', 'UserController@updatePassword')->name('password.change');
});


