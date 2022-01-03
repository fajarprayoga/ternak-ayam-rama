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

Route::middleware('auth:web')->group(function(){

    Route::get('/', function () {
        return view('pages.dashboard.dashboard');
    });

    Route::resource('user','UserController');
    Route::resource('anak-kandang','AnakKandangController');
    Route::resource('stok-pakan','StokPakanController');
    Route::resource('jadwal-doc','DOCController');
    Route::resource('jadwal-penjaringan','PenjaringanController');
    Route::resource('jadwal-panen','PanenController');
    Route::resource('bayaran','BayaranController');
    Route::get('keluhan','KeluhanController@index');
    
});
Route::resource('obat','ObatController');
Route::get('jadwal/{id}/approve','DOCController@approve')->name('jadwal.approve');

Route::resource('pengeluaran','PengeluaranController');
Route::get('pengeluaran/{id}/approve','PengeluaranController@approve')->name('pengeluaran.approve');

Route::middleware('auth:anak_kandang')->prefix('subadmin')->group(function(){

    Route::get('/', function () {
        return view('pages.dashboard.client');
    });
    Route::resource('pengeluaran','PengeluaranController');
    Route::resource('keluhan','KeluhanController');


});
Route::middleware('guest')->group(function(){

    
    Route::get('subadmin/login','AnakKandangController@login');
    Route::post('subadmin/login','AnakKandangController@authenticate');


});

Auth::routes();
