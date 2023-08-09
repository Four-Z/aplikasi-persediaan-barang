<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Auth::routes();



Route::middleware(['IsStaff'])->prefix('staff')->group(function () {
    Route::get('/home', [App\Http\Controllers\Staff\HomeController::class, 'index'])->name('staff.home');
    Route::get('/profile', [App\Http\Controllers\Staff\ProfileController::class, 'index'])->name('staff.profile');

    Route::get('/stok-barang', [App\Http\Controllers\Staff\StokBarangController::class, 'index'])->name('stok_barang');
    Route::get('/tambah-barang', [App\Http\Controllers\Staff\StokBarangController::class, 'tambah_barang_page'])->name('tambah_barang_page');

    Route::get('/data-supplier', [App\Http\Controllers\Staff\DataSupplierController::class, 'index'])->name('data_supplier');
    Route::get('/barang-masuk', [App\Http\Controllers\Staff\BarangMasukController::class, 'index'])->name('barang_masuk');
    Route::get('/barang-keluar', [App\Http\Controllers\Staff\BarangKeluarController::class, 'index'])->name('barang_keluar');
    Route::get('/laporan', [App\Http\Controllers\Staff\LaporanController::class, 'index'])->name('staff.laporan');
});

Route::middleware(['IsPimpinan'])->prefix('pimpinan')->group(function () {
    Route::get('/home', [App\Http\Controllers\Pimpinan\HomeController::class, 'index'])->name('pimpinan.home');
    Route::get('/profile', [App\Http\Controllers\Pimpinan\ProfileController::class, 'index'])->name('pimpinan.profile');
    Route::get('/kelola-staff', [App\Http\Controllers\Pimpinan\KelolaStaffController::class, 'index'])->name('kelola_staff');
    Route::get('/laporan', [App\Http\Controllers\Pimpinan\LaporanController::class, 'index'])->name('pimpinan.laporan');
});
