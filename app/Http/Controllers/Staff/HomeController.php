<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\DetailBarangKeluar;
use App\Models\DetailBarangMasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_barang = Barang::all()->count();
        $jumlah_supplier = Supplier::all()->count();
        $jumlah_barang_masuk = DetailBarangMasuk::all()->count();
        $jumlah_barang_keluar = DetailBarangKeluar::all()->count();

        return view('staff.home', [
            'jumlah_barang' => $jumlah_barang,
            'jumlah_supplier' => $jumlah_supplier,
            'jumlah_barang_masuk' => $jumlah_barang_masuk,
            'jumlah_barang_keluar' => $jumlah_barang_keluar
        ]);
    }
}
