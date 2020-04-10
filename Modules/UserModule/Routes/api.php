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

Route::group(['prefix' => 'users', 'namespace' => 'Api'], function () {

    Route::post('/login', 'UserController@login');
    Route::post('/register', 'UserController@register');
    Route::post('/activateMobile', 'UserController@mobileVerification');

    Route::get('/', 'UserController@index')->middleware('auth:admin');
    Route::post('/create', 'UserController@create')->middleware('auth:admin');
    Route::get('/find/{id}', 'UserController@find')->middleware('auth:admin,user');
    Route::post('/update', 'UserController@update')->middleware('auth:admin');
    Route::post('/delete', 'UserController@delete')->middleware('auth:admin')->name('deleteUser');
});