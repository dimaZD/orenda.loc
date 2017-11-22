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
Auth::routes();

Route::get('/', 'IndexController@index')->name('home');
Route::post('/', 'IndexController@search')->name('search');
Route::get('/flat/{id}', ['uses' => 'IndexController@show'])->name('flat');
Route::post('/flat/{flat_id}', ['middleware' => 'auth', 'uses' => 'OrderController@exec'])->name('order');
Route::put('/flat/{flat_id}/{order_id}',
    ['middleware' => 'auth', 'uses' => 'OrderController@accept'])->name('order.accept');
Route::delete('/flat/{order_id}', ['middleware' => 'auth', 'uses' => 'OrderController@cancel'])->name('order.cancel');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\IndexController@index')->name('cabinet');
    Route::resource('/flats', 'Admin\FlatController', ['except' => ['index', 'show', 'destroy']]);
    Route::get('/user', 'Admin\UserController@editUser')->name('user.edit');
    Route::post('/user', 'Admin\UserController@updateUser')->name('user.update');
});
