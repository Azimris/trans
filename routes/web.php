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

Auth::routes();

Route::get('/home', 'UserController@index')->name('home');
Route::get('search','UserController@search');
Route::group(['middleware'=>['auth']], function(){
	Route::get('/addfriends/{id}', 'UserController@addfriend')->name('addfriend');
	Route::get('/friends/{user}', 'UserController@friendlist')->name('friends');
	Route::get('/request', 'UserController@friendRequestList')->name('request');
	Route::get('/acceptRequest/{id}', 'UserController@acceptfriendRequestList')->name('acceptRequest');
	Route::get('/profile/{user}','UserController@otherprofile')->name('other_profile');
});
