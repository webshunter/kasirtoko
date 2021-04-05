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


// Route::get -> digunakan untuk method akses get only
// Route::get('/', 'gugusController@index');

// Route::get -> digunakan untuk method akses post only
// Route::get('/', 'gugusController@index');

Route::get('/', function () {
    return view('dashboard.dashboard');
});

// area accounting
Route::get('toko/loginmenu', 'toko@loginmenu');
Route::get('toko/logout', 'toko@logout');
Route::match(['get', 'post'],'toko/login', 'toko@login');
Route::match(['get', 'post'],'toko/pendaftaran/simpan', 'toko@pendaftaranSimpan');
Route::get('toko/signup', function(){
    return view('toko.signup');
});

// accounting dashboard
Route::match(['get', 'post'],'toko', 'toko@dashboard')->middleware('cekstatus');

// accounting toko stock barang
Route::match(['get', 'post'],'toko/stock-barang', 'stockBarang@show')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/stock-barang/data', 'stockBarang@stockBarang')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/stock-barang/data/{condition}', 'stockBarang@stockBarang')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/stock-barang/data/{condition}/{keyword}', 'stockBarang@stockBarang')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/stock-barang/simpan', 'stockBarang@simpan')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/stock-barang/update', 'stockBarang@update')->middleware('cekstatus');
Route::get('toko/stock-barang/tambah', function(){
    return view('toko.stock_barang.tambah');
})->middleware('cekstatus');



// accounting akun barang
Route::match(['get', 'post'],'toko/akun', 'akun@show')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/akun/data', 'akun@akun')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/akun/data/{condition}', 'akun@akun')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/akun/data/{condition}/{keyword}', 'akun@akun')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/akun/simpan', 'akun@simpan')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/akun/update', 'akun@update')->middleware('cekstatus');

Route::match(['get', 'post'],'toko/akun/cek', 'akun@cek')->middleware('cekstatus');

Route::get('toko/akun/tambah', function(){
    return view('toko.akun.tambah');
})->middleware('cekstatus');



// accounting harga-jual
Route::match(['get', 'post'],'toko/harga-jual', 'hargaJual@show')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/harga-jual/data', 'hargaJual@hargaJual')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/harga-jual/data/{condition}', 'hargaJual@hargaJual')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/harga-jual/data/{condition}/{keyword}', 'hargaJual@hargaJual')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/harga-jual/simpan', 'hargaJual@simpan')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/harga-jual/update', 'hargaJual@update')->middleware('cekstatus');

Route::match(['get', 'post'],'toko/harga-jual/cek', 'hargaJual@cek')->middleware('cekstatus');

Route::get('toko/harga-jual/tambah', function(){
    return view('toko.harga_jual.tambah');
})->middleware('cekstatus');

// accounting pesanan
Route::match(['get', 'post'],'toko/pesanan', 'pesanan@show')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/pesanan/data', 'pesanan@pesanan')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/pesanan/data/{condition}', 'pesanan@pesanan')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/pesanan/data/{condition}/{keyword}', 'pesanan@pesanan')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/pesanan/simpan', 'pesanan@simpan')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/pesanan/simpan_data', 'pesanan@simpan_data')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/pesanan/tambah_data/{condition1}', 'pesanan@tambah_data')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/pesanan/tambah_data/show_data/{condition1}', 'pesanan@show_data')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/pesanan/tambah_data/show_data/{condition1}', 'pesanan@show_data')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/pesanan/update', 'pesanan@update')->middleware('cekstatus');
Route::get('toko/pesanan/tambah', function(){
    return view('toko.pesanan.tambah');
})->middleware('cekstatus');


// accounting pesanan
Route::match(['get', 'post'],'toko/transaksi', 'transaksi@show')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/transaksi/data', 'transaksi@transaksi')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/transaksi/data/{condition}', 'transaksi@transaksi')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/transaksi/data/{condition}/{keyword}', 'transaksi@transaksi')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/transaksi/simpan', 'transaksi@simpan')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/transaksi/simpan_data', 'transaksi@simpan_data')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/transaksi/update', 'transaksi@update')->middleware('cekstatus');

Route::match(['get', 'post'],'toko/transaksi/tambah', 'transaksi@tambah')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/transaksi/tambah_data', 'transaksi@tambah_data')->middleware('cekstatus');

Route::match(['get', 'post'],'toko/transaksi/tambah_data/show_data/{condition1}', 'transaksi@show_data')->middleware('cekstatus');
Route::match(['get', 'post'],'toko/transaksi/tambah_data/show_data/{condition1}', 'transaksi@show_data')->middleware('cekstatus');