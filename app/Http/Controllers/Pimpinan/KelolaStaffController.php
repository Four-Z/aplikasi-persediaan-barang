<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaStaffController extends Controller
{
    public function index()
    {
        $staff = User::where('role', 0)->get();

        return view('pimpinan.kelola_staff', [
            'staff' => $staff
        ]);
    }

    public function tambah_staff_page()
    {
        return view('pimpinan.tambah_staff');
    }

    public function tambah_staff(Request $request)
    {
        $validated_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $validated_data['password'] = Hash::make($validated_data['password']);
        $validated_data['role'] = 0;


        try {
            User::create($validated_data);
            session()->flash('message_success', 'Berhasil Menambah Staff');
            alert()->success('Berhasil', 'Staff berhasil ditambah');
        } catch (Exception $err) {
            session()->flash('message_fail', 'Gagal Menambah Staff');
            alert()->error('Gagal', 'Staff Gagal ditambah');
        }
        return redirect()->route('kelola_staff');
    }

    public function hapus_staff(User $staff)
    {
        try {
            $staff->delete();
            session()->flash('message_success', 'Berhasil Menghapus Staff');
            alert()->success('Berhasil', 'Staff berhasil dihapus');
        } catch (Exception $err) {
            session()->flash('message_fail', 'Gagal Menghapus Staff');
            alert()->error('Gagal', 'Staff Gagal dihapus');
        }

        return redirect()->route('kelola_staff');
    }
}
