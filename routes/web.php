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
    Route::post('/tambah-barang', [App\Http\Controllers\Staff\StokBarangController::class, 'tambah_barang'])->name('tambah_barang');
    Route::get('/edit-barang/{barang}', [App\Http\Controllers\Staff\StokBarangController::class, 'edit_barang_page'])->name('edit_barang_page');
    Route::put('/edit-barang/{barang}', [App\Http\Controllers\Staff\StokBarangController::class, 'edit_barang'])->name('edit_barang');
    Route::delete('/hapus-barang/{barang}', [App\Http\Controllers\Staff\StokBarangController::class, 'hapus_barang'])->name('hapus_barang');

    Route::get('/data-supplier', [App\Http\Controllers\Staff\DataSupplierController::class, 'index'])->name('data_supplier');
    Route::get('/tambah-supplier', [App\Http\Controllers\Staff\DataSupplierController::class, 'tambah_supplier_page'])->name('tambah_supplier_page');
    Route::post('/tambah-supplier', [App\Http\Controllers\Staff\DataSupplierController::class, 'tambah_supplier'])->name('tambah_supplier');
    Route::get('/edit-supplier/{supplier}', [App\Http\Controllers\Staff\DataSupplierController::class, 'edit_supplier_page'])->name('edit_supplier_page');
    Route::put('/edit-supplier/{supplier}', [App\Http\Controllers\Staff\DataSupplierController::class, 'edit_supplier'])->name('edit_supplier');
    Route::delete('/hapus-supplier/{supplier}', [App\Http\Controllers\Staff\DataSupplierController::class, 'hapus_supplier'])->name('hapus_supplier');


    Route::get('/barang-masuk', [App\Http\Controllers\Staff\BarangMasukController::class, 'index'])->name('barang_masuk');
    Route::get('/tambah-barang-masuk', [App\Http\Controllers\Staff\BarangMasukController::class, 'tambah_barang_masuk_page'])->name('tambah_barang_masuk_page');
    Route::post('/tambah-barang-masuk', [App\Http\Controllers\Staff\BarangMasukController::class, 'tambah_barang_masuk'])->name('tambah_barang_masuk');
    Route::get('/barang-masuk-detail/{barang_masuk}', [App\Http\Controllers\Staff\BarangMasukController::class, 'barang_masuk_detail'])->name('barang_masuk_detail');
    Route::get('/cetak-barang-masuk/{barang_masuk}', [App\Http\Controllers\Staff\BarangMasukController::class, 'cetak_barang_masuk'])->name('cetak_barang_masuk');

    Route::get('/barang-keluar', [App\Http\Controllers\Staff\BarangKeluarController::class, 'index'])->name('barang_keluar');
    Route::get('/tambah-barang-keluar', [App\Http\Controllers\Staff\BarangKeluarController::class, 'tambah_barang_keluar_page'])->name('tambah_barang_keluar_page');
    Route::post('/tambah-barang-keluar', [App\Http\Controllers\Staff\BarangKeluarController::class, 'tambah_barang_keluar'])->name('tambah_barang_keluar');
    Route::get('/barang-keluar-detail/{barang_keluar}', [App\Http\Controllers\Staff\BarangKeluarController::class, 'barang_keluar_detail'])->name('barang_keluar_detail');
    Route::get('/cetak-barang-keluar/{barang_keluar}', [App\Http\Controllers\Staff\BarangKeluarController::class, 'cetak_barang_keluar'])->name('cetak_barang_keluar');

    Route::get('/laporan', [App\Http\Controllers\Staff\LaporanController::class, 'index'])->name('staff.laporan');
    Route::get('/cari-laporan-barang', [App\Http\Controllers\Staff\LaporanController::class, 'cari_laporan'])->name('staff.cari_laporan');
    Route::get('/cetak-laporan-barang', [App\Http\Controllers\Staff\LaporanController::class, 'cetak_laporan'])->name('staff.cetak_laporan');
});

Route::middleware(['IsPimpinan'])->prefix('pimpinan')->group(function () {
    Route::get('/home', [App\Http\Controllers\Pimpinan\HomeController::class, 'index'])->name('pimpinan.home');

    Route::get('/profile', [App\Http\Controllers\Pimpinan\ProfileController::class, 'index'])->name('pimpinan.profile');

    Route::get('/kelola-staff', [App\Http\Controllers\Pimpinan\KelolaStaffController::class, 'index'])->name('kelola_staff');
    Route::get('/tambah_staff', [App\Http\Controllers\Pimpinan\KelolaStaffController::class, 'tambah_staff_page'])->name('tambah_staff_page');
    Route::post('/tambah_staff', [App\Http\Controllers\Pimpinan\KelolaStaffController::class, 'tambah_staff'])->name('tambah_staff');
    Route::delete('/hapus-staff/{staff}', [App\Http\Controllers\Pimpinan\KelolaStaffController::class, 'hapus_staff'])->name('hapus_staff');

    Route::get('/laporan', [App\Http\Controllers\Pimpinan\LaporanController::class, 'index'])->name('pimpinan.laporan');
    Route::get('/cari-laporan-barang', [App\Http\Controllers\Pimpinan\LaporanController::class, 'cari_laporan'])->name('pimpinan.cari_laporan');
    Route::get('/cetak-laporan-barang', [App\Http\Controllers\Pimpinan\LaporanController::class, 'cetak_laporan'])->name('pimpinan.cetak_laporan');
});
