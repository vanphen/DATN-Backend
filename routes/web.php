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
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userchat', 'UserChatsController@index')->name('home');
Route::get('/profile', 'User\ProfileController@index')->name('profile');
Route::put('/profile/edit', 'User\ProfileController@edit')->name('profileEdit');
Route::get('/profile/edit', function() {
    return abort(404);
});
Route::get('/customer', 'CustomerController@index')->name('customer');

Route::prefix('admin')->group(function () {
    Route::get('/', 'HomeController@adminHome')->middleware('is_user');
    Route::get('home', 'HomeController@adminHome')->name('admin.home')->middleware('is_user');
    Route::get('manage', 'Admin\ManageController@index')->name('admin.manage')->middleware('is_user');

});

Route::prefix('superadmin')->group(function () {
    Route::get('/', 'HomeController@superadmin')->middleware('is_user');
    Route::get('home', 'HomeController@superadmin')->name('superadmin.home')->middleware('is_user');
});