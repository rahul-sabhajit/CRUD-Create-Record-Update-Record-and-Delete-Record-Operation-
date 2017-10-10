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


Route::get('/test', 'test_controller@index')->name("test");
Route::post('/test', 'test_controller@store')->name("test");
Route::get('/test/edit/{id}', 'test_controller@edit')->name("test");
Route::get('/test/delete/{id}', 'test_controller@delete')->name("test");
Route::put('/test', 'test_controller@update')->name("test");