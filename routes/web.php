<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/info', function () {
    return view('tambahan.articles');
});
Route::get('/test', function () {
    return view('layouts.modal');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
//SuperAdmin

//Admin


Route::group(['middleware'=>'web'],function(){
	Route::group(['prefix'=>'pengurus','middleware'=>['auth','role:admin']], function(){
	Route::resource('orang','OrangsController');
	Route::resource('fitrah','FitrahsController');
	Route::resource('mal','MalsController');
	Route::resource('berbagi','LainsController');
});
});
