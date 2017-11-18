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

Route::get('/matakuliah', 'MatakuliahController@index')->name('matakuliah.index');
Route::group(['prefix' => 'matakuliah', 'middleware' => 'auth'], function(){
  Route::get('/store', 'MatakuliahController@create')->name('matakuliah.store');
  Route::post('/store', 'MatakuliahController@store')->name('matakuliah.store.submit');
  Route::get('/edit/{kode_mk}', 'MatakuliahController@show')->name('matakuliah.edit');
  Route::put('/saveEdit/{kode_mk}', 'MatakuliahController@update')->name('matakuliah.edit.submit');
  Route::delete('/destroy/{kode_mk}', 'MatakuliahController@destroy')->name('matakuliah.destroy');
});

Route::get('/jarkom', 'JarkomController@index')->name('jarkom.index');
Route::get('/down/{id}', 'JarkomController@download')->name('jarkom.download');

Route::group(['prefix' => 'jarkom', 'middleware' => 'auth'], function(){
  Route::post('/store', 'JarkomController@store')->name('jarkom.store');
  Route::get('/edit/{id}', 'JarkomController@show')->name('jarkom.edit');
  Route::put('/saveEdit/{kode_mk}', 'JarkomController@update')->name('jarkom.edit.submit');
  Route::delete('/destroy/{kode_mk}', 'JarkomController@destroy')->name('jarkom.destroy');
});

Route::get('/sbd', 'SbdController@index')->name('sbd.index');
Route::get('/down/{id}', 'SbdController@download')->name('sbd.download');

Route::group(['prefix' => 'sbd', 'middleware' => 'auth'], function(){
  Route::post('/store', 'SbdController@store')->name('sbd.store');
  Route::get('/edit/{id}', 'SbdController@show')->name('sbd.edit');
  Route::put('/saveEdit/{id}', 'SbdController@update')->name('sbd.edit.submit');
  Route::delete('/destroy/{id}', 'SbdController@destroy')->name('sbd.destroy');
});
