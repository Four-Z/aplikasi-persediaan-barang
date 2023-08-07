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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/stok-barang', [App\Http\Controllers\Staff\StokBarangController::class, 'index'])->name('stok_barang');
Route::get('/data-supplier', [App\Http\Controllers\Staff\DataSupplierController::class, 'index'])->name('data_supplier');
Route::get('/barang-masuk', [App\Http\Controllers\Staff\BarangMasukController::class, 'index'])->name('barang_masuk');
Route::get('/barang-keluar', [App\Http\Controllers\Staff\BarangKeluarController::class, 'index'])->name('barang_keluar');
Route::get('/laporan', [App\Http\Controllers\Staff\LaporanController::class, 'index'])->name('laporan');
