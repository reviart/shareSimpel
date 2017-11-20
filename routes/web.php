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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

//Public access
Route::get('/matakuliah', 'MatakuliahController@index')->name('matakuliah.index');
Route::get('/files', 'FileController@index')->name('file.index');
Route::get('/down/{id}', 'FileController@download')->name('file.download');
Route::get('/jarkom', 'FileController@index')->name('jarkom');
Route::get('/sbd', 'FileController@index')->name('sbd');
Route::get('/pv', 'FileController@index')->name('pv');
Route::get('/pbo', 'FileController@index')->name('pbo');
Route::get('/pc', 'FileController@index')->name('pc');
Route::get('/tekan', 'FileController@index')->name('tekan');
Route::get('/simpel', 'FileController@index')->name('simpel');
Route::get('/rpw', 'FileController@index')->name('rpw');

//Auth access
Route::group(['prefix' => 'matakuliah', 'middleware' => 'auth'], function(){
  Route::get('/store', 'MatakuliahController@create')->name('matakuliah.store');
  Route::post('/store', 'MatakuliahController@store')->name('matakuliah.store.submit');
  Route::get('/edit/{kode_mk}', 'MatakuliahController@show')->name('matakuliah.edit');
  Route::put('/saveEdit/{kode_mk}', 'MatakuliahController@update')->name('matakuliah.edit.submit');
  Route::delete('/destroy/{kode_mk}', 'MatakuliahController@destroy')->name('matakuliah.destroy');
});

Route::group(['prefix' => 'files', 'middleware' => 'auth'], function(){
  Route::get('/store', 'FileController@create')->name('file.store');
  Route::post('/store', 'FileController@store')->name('file.store.submit');
  Route::get('/edit/{id}', 'FileController@show')->name('file.edit');
  Route::put('/saveEdit/{id}', 'FileController@update')->name('file.edit.submit');
  Route::delete('/destroy/{id}', 'FileController@destroy')->name('file.destroy');
});
