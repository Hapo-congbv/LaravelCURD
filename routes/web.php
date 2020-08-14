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

Route::get('/', function () {
    return view('admin/index');
});

Route::prefix('admin')->group(function () {
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::get('users-create', 'UsersController@create')->name('users.create');
    Route::post('users-create-save', 'UsersController@store')->name('users.create.save');
    Route::get('users/{id}', 'UsersController@show')->name('users.show');
    Route::get('users-edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::post('users-edit-save/{id}', 'UsersController@update')->name('users.edit.save');
    Route::get('users-delete/{id}', 'UsersController@destroy')->name('users.delete');
});


// Route::resource('users', 'UsersController');
