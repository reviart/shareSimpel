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
Route::get('/down/{id}', 'FileController@download')->name('file.download');
Route::get('/files', 'FileController@index')->name('file.index');
Route::get('/tugasmhs', 'TugasController@index')->name('tugas.index');
Route::post('/tugasmhs', 'TugasController@store')->name('tugas.store');

Route::get('/files/jarkom', 'FileController@jarkom')->name('file.index.jarkom');
Route::get('/files/sbd', 'FileController@sbd')->name('file.index.sbd');
Route::get('/files/pv', 'FileController@pv')->name('file.index.pv');
Route::get('/files/pbo', 'FileController@pbo')->name('file.index.pbo');
Route::get('/files/pc', 'FileController@pc')->name('file.index.pc');
Route::get('/files/tekan', 'FileController@tekan')->name('file.index.tekan');
Route::get('/files/simpel', 'FileController@simpel')->name('file.index.simpel');
Route::get('/files/rpw', 'FileController@rpw')->name('file.index.rpw');

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

//route not defined
Route::get('/error',function(){
   abort(404);
});
