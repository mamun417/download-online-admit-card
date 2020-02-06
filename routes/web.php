<?php

//Frontend route
Auth::routes([
    'register' => false,
    'verify' => false
]);

Route::group(['middleware' => ['auth']], function (){

    Route::get('/', function () {
        return view('frontend.home');
    });

    Route::get('download-admin-card', 'UserController@downloadAdmitCard')->name('user.download-admit-card');

    Route::get('password/change', 'Admin\UserController@changePassword')->name('password.change');
    Route::post('password/change', 'Admin\UserController@updatePassword')->name('password.change');
});

Route::get('password/recover', 'UserController@showPasswordRecoverForm')->name('user.password-recover');
Route::post('password/recover', 'UserController@passwordRecover')->name('user.password-recover');




//Admin route
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Auth::routes(['register' => false]);
});

Route::group(['middleware' => ['auth', 'admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', function () {
        return view('admin.home');
    });

    Route::resource('users', 'UserController');

    Route::get('download-admin-card', 'UserController@downloadAdmitCard')->name('download-admit-card');

    Route::get('password/change', 'UserController@changePassword')->name('password.change');
    Route::post('password/change', 'UserController@updatePassword')->name('password.change');
});


