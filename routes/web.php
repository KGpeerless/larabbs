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

Route::get('/', 'TopicsController@index')->name('root');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');

Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);

Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);

Route::get('permission-denied', 'PagesController@permissionDenied')->name('permission-denied');

Route::get('groups', 'GroupsController@index')->name('groups.index');

// room
Route::group(['middleware' => 'auth', 'prefix' => 'room'], function () {
    Route::get('create', 'RoomController@create')->name('room.create');
    Route::get('lists', 'RoomController@lists')->name('room.lists');
    Route::post('add', 'RoomController@add')->name('room.add');
    Route::get('/{id}/edit', 'RoomController@edit')->name('room.edit');
    Route::post('/{id}/update', 'RoomController@update')->name('room.update');
    Route::get('{id}', 'RoomController@chat')->name('chat');
    Route::get("/{id}/join", 'RoomController@join')->name('join');
});

Route::group(['middleware' => 'auth', 'prefix' => 'api/room' , 'namespace' => 'Api'], function () {
    Route::post("/{id}/join" , 'RoomController@join')->name('join');
});
