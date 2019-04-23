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
    return view('admin/dashboard/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/dashboard', 'DashBoardController');

Route::resource('/admin/student', 'StudentCrudController');

Route::resource('/admin/index', 'MessageLogsController');

Route::resource('/admin/user', 'UserCrudController');
