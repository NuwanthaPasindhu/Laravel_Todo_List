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
Route::get('/','HomeController@index')->name('home');

Route::prefix('/todo')->group(function(){
    Route::get('/','TodoController@index')->name('todo');
    Route::post('/add','TodoController@add')->name('todo.add');
    Route::get('{id}/complete','TodoController@complete')->name('todo.complete');
    Route::get('{id}/notcomplete','TodoController@notcomplete')->name('todo.notcomplete');
    Route::get('{id}/delete','TodoController@delete')->name('todo.delete');
});
