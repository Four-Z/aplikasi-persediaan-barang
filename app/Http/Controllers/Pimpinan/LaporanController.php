<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('pimpinan.laporan');
    }

    public function cari_laporan(Request $request)
    {
        $tanggal_awal = Carbon::parse($request->start_date);
        $tanggal_akhir = Carbon::parse($request->end_date);

        if ($request->opsi_barang == "masuk") {
            $barang = BarangMasuk::whereDate('tanggal', '<=', $tanggal_akhir)
                ->whereDate('tanggal', '>=', $tanggal_awal)->get();
        } else {
            $barang = BarangKeluar::whereDate('tanggal', '<=', $tanggal_akhir)
                ->whereDate('tanggal', '>=', $tanggal_awal)->get();
        }

        return view('pimpinan.laporan', [
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'barang' => $barang,
            'opsi_barang' => $request->opsi_barang
        ]);
    }

    public function cetak_laporan(Request $request)
    {
        $tanggal_awal = Carbon::parse($request->start_date);
        $tanggal_akhir = Carbon::parse($request->end_date);

        if ($request->opsi_barang == "masuk") {
            $barang = BarangMasuk::whereDate('tanggal', '<=', $tanggal_akhir)
                ->whereDate('tanggal', '>=', $tanggal_awal)->get();

            $judul = "MASUK";
        } else {
            $barang = BarangKeluar::whereDate('tanggal', '<=', $tanggal_akhir)
                ->whereDate('tanggal', '>=', $tanggal_awal)->get();

            $judul = "KELUAR";
        }

        return view('pimpinan.cetak_laporan', [
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'barang' => $barang,
            'judul' => $judul
        ]);
    }
}
