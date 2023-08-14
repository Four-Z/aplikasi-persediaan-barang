<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 0) {
            $layout = "layouts.staff";
        } else {
            $layout = "layouts.pimpinan";
        }
        return view('profile', [
            'user' => $user,
            'layout' => $layout
        ]);
    }

    public function update_profile(Request $request)
    {

        $validated_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id],
        ]);

        // dd('tes');

        $user = User::where('id', Auth::user()->id)->first();

        if ($request->hasFile("foto_profile")) {
            $foto = $request->file('foto_profile');
            $ext = $foto->getClientOriginalExtension();
            $path = Str::random(28) . "." . $ext;
            $foto->move(public_path('/foto_profile'), $path);
            $user->foto_profile = $path;
        }

        try {
            $user->name = $validated_data['name'];
            $user->email = $validated_data['email'];
            $user->update();

            session()->flash('message_success', 'Berhasil Memperbarui Profile');
            alert()->success('Berhasil', 'Profile berhasil diperbarui');
        } catch (Exception $err) {
            session()->flash('message_fail', 'Gagal Memperbarui Profile');
            alert()->error('Gagal', 'Profile Gagal diperbarui');
        }

        return redirect()->route('profile');
    }
}
