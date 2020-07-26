<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});
Auth::routes();
Route::get('/', 'HomeController@index')->name('user.index')->middleware('is_user');
Route::get('/home', 'HomeController@index')->name('user.home')->middleware('is_user');
Route::get('/userchat', 'UserChatsController@index')->name('user.chat')->middleware('is_user');
Route::get('/profile', 'User\ProfileController@index')->name('user.profile')->middleware('is_user');
Route::put('/profile/edit', 'User\ProfileController@edit')->name('user.profileEdit')->middleware('is_user');
Route::get('/profile/edit', function() {
    return abort(404);
});
Route::get('/customer', 'CustomerController@index')->name('user.customer')->middleware('is_user');

Route::prefix('/admin')->group(function () {
    Route::get('/', 'HomeController@adminHome')->name('admin.index')->middleware('is_user');
    Route::get('home', 'HomeController@adminHome')->name('admin.home')->middleware('is_user');
    Route::get('manage', 'Admin\ManageController@index')->name('admin.manage')->middleware('is_user');
    Route::get('customer', 'CustomerController@index')->name('admin.customer')->middleware('is_user');
    Route::get('/code', function() {
        return view('admin.code');
    });

});

Route::prefix('/superadmin')->group(function () {
    Route::get('/', 'HomeController@superadmin')->name('superadmin.index')->middleware('is_user');
    Route::get('home', 'HomeController@superadmin')->name('superadmin.home')->middleware('is_user');
    Route::get('manage', 'SuperAdmin\ManageController@index')->name('superadmin.manage')->middleware('is_user');
});