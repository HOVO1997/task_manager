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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/edit/{id}', 'TaskController@edit_user')->where('id', '[0-9]+')->name('edit_user');

Route::put('/home/update/{id}', 'TaskController@user_update')->name('user_update');

Route::get('home/search','TaskController@search')->name('search');

Route::get('/home/show/{id}', 'TaskController@show')->where('id', '[0-9]+')->name('show');

Route::middleware('manager')->group(function (){

    Route::get('/manager','TaskController@get_result')->name('get_result');

    Route::get('/home/create_task', 'TaskController@index')->name('create_task');

    Route::post('/manager/store', 'TaskController@store')->name('task_store');

    Route::get('/manger/edit/{id}', 'TaskController@edit')->where('id', '[0-9]+')->name('edit');

    Route::put('/manager/update/{id}', 'TaskController@update')->name('update');

    Route::delete('/manager/destroy/{id}', 'TaskController@destroy')->name('destroy');

});



















