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

Route::get('member', 'MemberController@index');
Route::get('member/create', 'MemberController@create');
Route::get('member/{id}', 'MemberController@show');
Route::get('member/{id}/edit', 'MemberController@edit');

Route::post('member/create', 'MemberController@store');
Route::patch('member/{id}/edit', 'MemberController@update')->name('update');
Route::delete('member/{id}', 'MemberController@destroy')->name('delete');
