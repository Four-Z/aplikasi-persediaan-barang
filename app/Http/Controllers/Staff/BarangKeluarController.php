<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        return view('staff.barang_keluar');
    }
}
