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
//微信或支付宝授权
Route::get('wx-or-ali-auth','Auth\AuthUserInfoController@getUserInfo')->name('WAauth');
Route::get('auth-callback','Auth\AuthUserInfoController@authCallback');
//会员中心
Route::get('user-center','UserCenterController@index')->name('ucenter')->middleware('wxorali');