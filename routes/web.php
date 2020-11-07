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

Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::routes();

// -- Tasks ---
Route::get('tasks', 'TaskController@getTasks')->name('tasks');
Route::put('task', 'TaskController@updateTask');
Route::post('task', 'TaskController@createTask');
Route::delete('task/{id}', 'TaskController@deleteTask');
