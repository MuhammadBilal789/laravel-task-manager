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
Route::redirect('/', '/login');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/tasks/search', 'TaskController@search')->name('tasks.search');
    Route::resource('tasks', 'TaskController');

});
