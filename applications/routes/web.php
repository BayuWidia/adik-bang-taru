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
    return view('login.login');
})->name('login.index');

Route::get('dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard.index');

Route::get('seleksi-kegiatan', 'SeleksiKegiatanController@seleksi')->name('seleksi-kegiatan.index');
Route::get('seleksi-kegiatan/bidang', 'SeleksiKegiatanController@seleksiperbidang')->name('seleksi-kegiatan.bidang');

Route::get('manajemen-akun', 'ManajemenAkunController@index')->name('akun.index');

Route::get('verifikasi-dokumen', 'VerifikasiDokumenController@index')->name('verifikasi.index');
Route::get('verifikasi-dokumen/detail', 'VerifikasiDokumenController@detail')->name('verifikasi.detail');
