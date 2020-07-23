<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getMessage/{id}', 'UserChatsController@show')->name('getMessageZoom');
Route::post('/manage/create', 'Admin\ManageController@create')->name('createUser');
Route::put('/manage/update', 'Admin\ManageController@update')->name('updateUser');
Route::delete('/manage/delete{id}', 'Admin\ManageController@destroy')->name('delteUser');
Route::put('/profile/changepassword', 'User\ProfileController@updatePassWord')->name('changePass');
Route::put('/customer/updateStatus/{id}', 'CustomerController@update')->name('updatestatus');
Route::delete('/customer/destroy/{id}', 'CustomerController@destroy')->name('delete');
Route::get('/getActivity/{id}', 'UserChatsController@getInforActivity');

Route::put('/company/update', 'SuperAdmin\ManageController@update');