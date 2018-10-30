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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 Route::get('index_kategori', 'KategoriController@index');
    Route::get('kategori/{id}', 'KategoriController@show')->name('kategori.show');
    Route::get('create_kategori', 'KategoriController@create')->name('kategori.create');
    Route::post('kategori/save', 'KategoriController@store')->name('kategori.store');
    Route::delete('index_kategori/{index_kategori}', 'KategoriController@destroy')->name('kategori.destroy');
    Route::get('kategori/edit/{id}', 'KategoriController@edit')->name('kategori.edit');
    Route::patch('kategori/{id}', 'KategoriController@update')->name('kategori.update');

     Route::get('index_transaksi', 'TransaksiController@index');
     Route::get('index_bulanan', 'TransaksiController@index_bulanan');
     Route::get('list', 'TransaksiController@list');
     Route::post('list/save', 'TransaksiController@store_list')->name('list.store');
    Route::get('transaksi/{id}', 'TransaksiController@show')->name('transaksi.show');
    Route::get('create_transaksi', 'TransaksiController@create')->name('transaksi.create');
    Route::post('transaksi/save', 'TransaksiController@store')->name('transaksi.store');
    Route::delete('index_transaksi/{index_transaksi}', 'TransaksiController@destroy')->name('transaksi.destroy');
    Route::get('transaksi/edit/{id}', 'TransaksiController@edit')->name('transaksi.edit');
    Route::patch('transaksi/{id}', 'TransaksiController@update')->name('transaksi.update');