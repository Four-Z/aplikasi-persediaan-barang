<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\DetailBarangMasuk;
use App\Models\Supplier;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barang_masuk = BarangMasuk::all();
        return view('staff.barang_masuk', [
            'barang_masuk' => $barang_masuk
        ]);
    }

    public function tambah_barang_masuk_page()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        $user = Auth::user();

        return view('staff.tambah_barang_masuk', [
            'barang' => $barang,
            'supplier' => $supplier,
            'staff' => $user
        ]);
    }

    public function tambah_barang_masuk(Request $request)
    {

        try {
            $formattedDate = Carbon::createFromFormat('m/d/Y', $request->tanggal)->format('Y-m-d');
            $barang_masuk = BarangMasuk::create([
                'supplier_id' => $request->supplier,
                'staff_id' => $request->staff,
                'catatan' => $request->catatan,
                'tanggal' => $formattedDate
            ]);

            $nama_barang = collect($request->nama_barang);
            $jumlah_barang = collect($request->jumlah_barang);

            $barang_zip = $nama_barang->zip($jumlah_barang);

            foreach ($barang_zip as $b) {
                DetailBarangMasuk::create([
                    'barang_masuk_id' => $barang_masuk->id,
                    'barang_id' => $b['0'],
                    'jumlah_barang' => $b['1']
                ]);

                $barang = Barang::where('id', $b['0'])->first();
                $barang->stok_barang += $b['1'];
                $barang->save();
            }

            session()->flash('message_success', 'Berhasil Menambah Barang Masuk');
            alert()->success('Berhasil', 'Barang Masuk berhasil ditambahkan');
            return redirect()->route('barang_masuk');
        } catch (Exception $err) {
            session()->flash('message_fail', 'Gagal Menambah Barang Masuk');
            alert()->error('Gagal', 'Barang Masuk gagal ditambahkan');
            return redirect()->route('barang_masuk');
        }
    }

    public function barang_masuk_detail(BarangMasuk $barang_masuk)
    {
        return view('staff.barang_masuk_detail', [
            'barang_masuk' => $barang_masuk
        ]);
    }
}
