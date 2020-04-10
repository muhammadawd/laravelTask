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

Route::prefix('adminPanel')->group(function () {

    Route::get('login', 'AdminModuleController@loginView')->name('login');
    Route::post('handleLogin', 'AdminModuleController@handleLogin')->name('handleLogin');
    Route::get('handlelogout', 'AdminModuleController@handleLogout')->name('logout');

    Route::get('', 'AdminModuleController@indexView')->name('dashboard')->middleware('auth:web');

    Route::prefix('users')->group(function () {
        Route::get('', 'AdminModuleController@index')->name('allUsers')->middleware('auth:web');
        Route::get('create', 'AdminModuleController@create')->name('createUser')->middleware('auth:web');
        Route::post('create', 'AdminModuleController@store')->name('handleCreateUser')->middleware('auth:web');
        Route::get('edit/{id}', 'AdminModuleController@edit')->name('editUser')->middleware('auth:web');
        Route::post('edit/{id}', 'AdminModuleController@update')->name('handleUpdateUser')->middleware('auth:web');
        Route::delete('delete', 'AdminModuleController@destroy')->name('handleDeleteUser')->middleware('auth:web');
    });
});
