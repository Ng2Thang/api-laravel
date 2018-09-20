<?php

use Illuminate\Http\Request;

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
Route::post('user/login','Api\UserController@login');
Route::get('user/info/{email}','Api\UserController@getUserByEmail');
Route::resource('user','Api\UserController');

Route::get('late/info/{email}','Api\LateController@getInfo');
Route::resource('late','Api\LateController');
