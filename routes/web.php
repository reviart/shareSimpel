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

Route::get('/file', 'FileController@index')->name('file.home');
Route::post('/file/store', 'FileController@store')->name('file.store');
Route::delete('/file/destroy/{id}/{name}', 'FileController@destroy')->name('file.destroy');
Route::get('/file/edit/{id}', 'FileController@show')->name('file.edit');
Route::put('/file/saveEdit/{id}', 'FileController@update')->name('file.edit.submit');
Route::get('/down/{id}', 'FileController@download')->name('file.download');

Route::get('/upload', 'UploadController@index')->name('upload.home');
Route::post('/store', 'UploadController@store')->name('upload.store');
Route::get('/show', 'UploadController@show')->name('upload.show');
