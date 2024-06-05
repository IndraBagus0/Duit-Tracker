<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class ProfilUserController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('profil.index', compact('user'));
    }

    public function update(Request $request) {
        $user = Auth::user();

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:8'
        ],
        [
            // Pesan kesalahan
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'name.min' => 'Nama minimal 5 karakter.',
        
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.string' => 'Nomor HP harus berupa teks.',
            'no_hp.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',

            'password.required' => 'Kata sandi wajib diisi.',
            'password.string' => 'Kata sandi harus berupa teks.',
            'password.min' => 'Kata sandi harus memiliki minimal 8 karakter.',
        ]);

        // Update the user data
        $user->name = $request->input('name');
        $user->no_hp = $request->input('no_hp');

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        // Redirect back with a success message
        return redirect()->route('profil.update')->with('success', 'Profil berhasil diperbarui.');
    }

    public function upgrade() {
        $user = Auth::user();
        
        $user->id_role = 4; 
        $user->save();
        
        return redirect()->route('profil.update')->with('success', 'Akun berhasil diupgrade, silahkan tunggu konfirmasi dari admin.');
    }
}
