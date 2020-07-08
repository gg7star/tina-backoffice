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
    return view('welcome');
});
Route::get('users', 'HomeController@users');
Route::get('solutions', 'HomeController@solutions');
Route::get('convenience', 'HomeController@convenience');
Route::get('tinalab', 'HomeController@tinalab');
