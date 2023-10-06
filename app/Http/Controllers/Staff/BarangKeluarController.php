<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\DetailBarangKeluar;
use App\Models\Supplier;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barang_keluar = BarangKeluar::latest()->get();
        return view('staff.barang_keluar', [
            'barang_keluar' => $barang_keluar
        ]);
    }

    public function tambah_barang_keluar_page()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        $user = Auth::user();

        return view('staff.tambah_barang_keluar', [
            'barang' => $barang,
            'supplier' => $supplier,
            'staff' => $user
        ]);
    }

    public function tambah_barang_keluar(Request $request)
    {
        DB::beginTransaction();

        try {

            $formattedDate = Carbon::createFromFormat('m/d/Y', $request->tanggal)->format('Y-m-d');
            $barang_keluar = BarangKeluar::create([
                'supplier_id' => $request->supplier,
                'staff_id' => $request->staff,
                'catatan' => $request->catatan,
                'tanggal' => $formattedDate
            ]);

            $nama_barang = collect($request->nama_barang);
            $jumlah_barang = collect($request->jumlah_barang);

            $barang_zip = $nama_barang->zip($jumlah_barang);

            foreach ($barang_zip as $b) {
                $barang = Barang::where('id', $b['0'])->first();
                $stok = $barang->stok_barang - $b['1'];
                if ($stok >= 0) {
                    $barang->stok_barang = $stok;
                    $barang->save();
                } else {
                    DB::rollback();
                    session()->flash('message_fail', 'Jumlah Barang Keluar harus kurang dari stok barang');
                    alert()->error('Gagal', 'Jumlah Barang Keluar harus kurang dari stok barang');
                    return redirect()->route('barang_keluar');
                }

                DetailBarangKeluar::create([
                    'barang_keluar_id' => $barang_keluar->id,
                    'barang_id' => $b['0'],
                    'jumlah_barang' => $b['1']
                ]);
            }

            DB::commit();

            session()->flash('message_success', 'Berhasil Menambah Barang keluar');
            alert()->success('Berhasil', 'Barang keluar berhasil ditambahkan');
            return redirect()->route('barang_keluar');
        } catch (\Exception $e) {

            DB::rollback();

            session()->flash('message_fail', 'Gagal Menambah Barang keluar');
            alert()->error('Gagal', 'Barang keluar gagal ditambahkan');
            return redirect()->route('barang_keluar');
        }
    }

    public function barang_keluar_detail(BarangKeluar $barang_keluar)
    {
        return view('staff.barang_keluar_detail', [
            'barang_keluar' => $barang_keluar
        ]);
    }

    public function cetak_barang_keluar(BarangKeluar $barang_keluar)
    {
        return view('staff.cetak_detail_barang', [
            'judul' => "Keluar",
            'barang' => $barang_keluar
        ]);
    }
}
