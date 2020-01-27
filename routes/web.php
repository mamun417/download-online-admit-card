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

/*Route::get('/', function () {
    return view('admin.home');
});*/

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Admin route
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {

    // Dashboard
    Route::get('/', function () {
        return view('admin.home');
    });

    // Users
    Route::resource('students', 'Admin\StudentController');

});
