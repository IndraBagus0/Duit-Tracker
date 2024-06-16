<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi data permintaan
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'phoneNumber' => 'nullable|string|max:15',
                'password' => 'nullable|string|min:8'
            ],
            [
                // Pesan kesalahan
                'name.required' => 'Nama wajib diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',

                'phoneNumber.string' => 'Nomor HP harus berupa teks.',
                'phoneNumber.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',

                'password.string' => 'Kata sandi harus berupa teks.',
                'password.min' => 'Kata sandi harus memiliki minimal 8 karakter.',
            ]
        );

        // Update data pengguna
        $user->name = $request->input('name');
        $user->phoneNumber = $request->input('phoneNumber');

        // Update kata sandi jika diberikan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Simpan data pengguna
        $user->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function upgrade()
    {
        $user = Auth::user();

        $user->roleId = 4;  // Asumsi: roleId 4 adalah status yang diinginkan
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Akun berhasil diupgrade, silahkan tunggu konfirmasi dari admin.');
    }
}
