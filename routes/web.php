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
    return view('index');
})->middleware('auth');

Auth::routes();

Route::group(['prefix'=>'lates'],function(){
        Route::get('create','LateController@create');
        Route::post('create','LateController@store')->name('lates.create');
        Route::get('my-history','LateController@my_history');
        
      
    });

Route::group(['prefix'=>'admin','middleware'=>'admin'], function () {
	//Route::get('','AdminController@index');
    
    Route::group(['prefix'=>'lates'],function(){
        Route::get('pending','AdminController@getListLatePending')->name('admin.lates.pending');
        Route::get('history','AdminController@getListLateHistory');
        Route::get('approved/{id}/{flag}','AdminController@approvedLate');
      
    });

    Route::group(['prefix'=>'positions'],function(){
        Route::get('','AdminController@getListPosition')->name('admin.positions.index');
        Route::get('create','AdminController@getCreatePosition')->name('admin.positions.create');
        Route::post('create','AdminController@postCreatePosition')->name('admin.positions.create');
        
      
    });
    
});

// Route PROFILE ( USER )
//Route::get('')
 Route::group(['prefix'=>'profile'],function(){
        Route::get('edit','ProfileController@edit')->name('profile.getEdit');
        Route::post('edit','ProfileController@update')->name('profile.postEdit');
        Route::get('my-profile','ProfileController@index')->name('profile.index');
        Route::get('create','ProfileController@create')->name('profile.getCreate')->middleware('profilecheck');
        Route::post('create','ProfileController@store')->name('profile.postCreate');      
    });
Route::get('ipa',function(){
    return view('api.blade.php');
})