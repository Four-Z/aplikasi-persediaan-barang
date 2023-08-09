<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class StokBarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();

        return view('staff.stok_barang', [
            'barang' => $barang
        ]);
    }

    public function tambah_barang_page()
    {
        return view('staff.tambah_barang');
    }

    public function tambah_barang(Request $request)
    {
        $validated_data = $request->validate(
            [
                'nama_barang' => 'required|max:255',
                'harga_barang' => 'required|numeric|digits_between:1,20',
                'stok_barang' => 'required|numeric|digits_between:1,20'
            ]
        );

        try {
            Barang::create($validated_data);
            session()->flash('message_success', 'Berhasil Menambah Barang');
            alert()->success('Berhasil', 'Barang berhasil ditambahkan');
        } catch (Exception $err) {
            session()->flash('message_fail', 'Gagal Menambah Barang');
            alert()->error('Gagal', 'Barang gagal ditambahkan');
        }


        return redirect()->route('stok_barang');
    }

    public function edit_barang_page(Barang $barang)
    {
        return view('staff.edit_barang', [
            'barang' => $barang
        ]);
    }

    public function edit_barang(Barang $barang, Request $request)
    {
        $validated_data = $request->validate(
            [
                'nama_barang' => 'required|max:255',
                'harga_barang' => 'required|numeric|digits_between:1,20',
                'stok_barang' => 'required|numeric|digits_between:1,20'
            ]
        );

        try {
            $barang->update($validated_data);
            $barang->save();
            session()->flash('message_success', 'Berhasil Mengedit Barang');
            alert()->success('Berhasil', 'Barang berhasil diedit');
        } catch (Exception $err) {
            session()->flash('message_fail', 'Gagal Menambah Barang');
            alert()->error('Gagal', 'Barang Gagal Ditambahkan');
        }

        return redirect()->route('stok_barang');
    }

    public function hapus_barang(Barang $barang)
    {
        try {
            $barang->delete();
            session()->flash('message_success', 'Berhasil Menghapus Barang');
            alert()->success('Berhasil', 'Barang berhasil dihapus');
        } catch (Exception $err) {
            session()->flash('message_fail', 'Gagal Menghapus Barang');
            alert()->error('Gagal', 'Barang Gagal dihapus');
        }

        return redirect()->route('stok_barang');
    }
}
