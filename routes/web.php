<?php

Route::group(['middleware' => ['auth', 'preventBackHistory']], function (){

    Route::get('/', function () {
        return view('home');
    });

    Route::get('password/change', 'Admin\UserController@changePassword')->name('password.change');
    Route::post('password/change', 'Admin\UserController@updatePassword')->name('password.change');
});

Auth::routes([
    'register' => false,
    'verify' => false
]);




//Admin route
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Auth::routes(['register' => false]);
});

Route::group(['middleware' => ['auth', 'admin', 'preventBackHistory'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', function () {
        return view('admin.home');
    });

    Route::resource('users', 'UserController');

    /*Route::get('password/change', 'UserController@changePassword')->name('password.change');
    Route::post('password/change', 'UserController@updatePassword')->name('password.change');*/
});


