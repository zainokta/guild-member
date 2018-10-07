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
use App\Http\Middleware\GuildRole;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/member', 'as' => 'members.'], function() {
    Route::get('/', 'MemberController@index')->name('index');
    Route::get('/create', 'MemberController@create')->name('create')->middleware(GuildRole::class);
    Route::get('/{id}', 'MemberController@show')->name('read');
    Route::get('/{id}/edit', 'MemberController@edit')->name('edit')->middleware(GuildRole::class);
    
    Route::post('/create', 'MemberController@store')->name('store')->middleware(GuildRole::class);
    Route::patch('/{id}/edit', 'MemberController@update')->name('update')->middleware( GuildRole::class);
    Route::delete('/{id}/delete', 'MemberController@destroy')->name('delete')->middleware(GuildRole::class);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
