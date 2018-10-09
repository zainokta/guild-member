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

Route::group(['prefix' => '/member', 'as' => 'members.'], function() {
    Route::get('/', 'MemberController@index')->name('index');
    Route::get('/{id}', 'MemberController@show')->name('read');
});

Route::group(['prefix' => '/admin', 'as' => 'admins.' , 'middleware' => 'role'], function() {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/create', 'AdminController@create')->name('create');
    Route::get('/{id}', 'AdminController@show')->name('read');
    Route::get('/{id}/edit', 'AdminController@edit')->name('edit');
    
    Route::post('/create', 'AdminController@store')->name('store');
    Route::patch('/{id}/edit', 'AdminController@update')->name('update');
    Route::delete('/{id}/delete', 'AdminController@destroy')->name('delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
