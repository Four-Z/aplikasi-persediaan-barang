<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StokBarangController extends Controller
{
    public function index()
    {
        return view('staff.stok_barang');
    }

    public function tambah_barang_page()
    {
        return view('staff.tambah_barang');
    }
}
