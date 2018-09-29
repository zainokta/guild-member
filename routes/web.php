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
    Route::get('/create', 'MemberController@create')->name('create');
    Route::get('/{id}', 'MemberController@show')->name('read');
    Route::get('/{id}/edit', 'MemberController@edit')->name('edit');
    
    Route::post('/create', 'MemberController@store')->name('store');
    Route::patch('/{id}/edit', 'MemberController@update')->name('update');
    Route::delete('/{id}/delete', 'MemberController@destroy')->name('delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
