<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;

class DataSupplierController extends Controller
{
    public function index()
    {

        $supplier = Supplier::all();
        return view('staff.data_supplier', [
            'supplier' => $supplier
        ]);
    }

    public function tambah_supplier_page()
    {
        return view('staff.tambah_supplier');
    }

    public function tambah_supplier(Request $request)
    {
        $validated_data = $request->validate(
            [
                'nama_supplier' => 'required|max:255',
                'lokasi_supplier' => 'required',
                'kontak_supplier' => 'required|min:10|max:15'
            ]
        );

        try {
            Supplier::create($validated_data);
            session()->flash('message_success', 'Berhasil Menambah Supplier');
            alert()->success('Berhasil', 'Supplier berhasil ditambahkan');
        } catch (Exception $err) {
            session()->flash('message_fail', 'Gagal Menambah Supplier');
            alert()->error('Gagal', 'Supplier gagal ditambahkan');
        }


        return redirect()->route('data_supplier');
    }

    public function edit_supplier_page(Supplier $supplier)
    {
        return view('staff.edit_supplier', [
            'supplier' => $supplier
        ]);
    }

    public function edit_supplier(Supplier $supplier, Request $request)
    {
        $validated_data = $request->validate(
            [
                'nama_supplier' => 'required|max:255',
                'lokasi_supplier' => 'required',
                'kontak_supplier' => 'required|min:10|max:15'
            ]
        );

        try {
            $supplier->update($validated_data);
            $supplier->save();
            session()->flash('message_success', 'Berhasil Mengedit Supplier');
            alert()->success('Berhasil', 'Supplier berhasil diedit');
        } catch (Exception $err) {
            session()->flash('message_fail', 'Gagal Mengedit Supplier');
            alert()->error('Gagal', 'Supplier Gagal Diedit');
        }

        return redirect()->route('data_supplier');
    }

    public function hapus_supplier(Supplier $supplier)
    {
        try {
            $supplier->delete();
            session()->flash('message_success', 'Berhasil Menghapus Supplier');
            alert()->success('Berhasil', 'Supplier berhasil dihapus');
        } catch (Exception $err) {
            session()->flash('message_fail', 'Gagal Menghapus Supplier');
            alert()->error('Gagal', 'Supplier Gagal dihapus');
        }

        return redirect()->route('data_supplier');
    }
}
