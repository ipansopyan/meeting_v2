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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'MeetingController@index')->name('home');
Route::get('/home/create', 'MeetingController@create')->name('home/create');


Route::group(['prefix' => 'meeting'],function() {
  Route::get('/create', 'MeetingController@create')->name('meeting/create');
  Route::post('/store', 'MeetingController@store')->name('meeting/store');
  Route::get('/{id}/show', 'MeetingController@show')->name('meeting/show');
  Route::get('/{id}/edit', 'MeetingController@edit')->name('meeting/edit');
  Route::post('/{id}/update', 'MeetingController@update')->name('meeting/update');
  Route::delete('/{id}/destroy', 'MeetingController@destroy')->name('meeting/destroy');

  Route::get('/{id}/join', 'JoinControlller@join')->name('meeting/join');
  Route::get('/{id}/unjoin', 'JoinControlller@unjoin')->name('meeting/unjoin');
});
