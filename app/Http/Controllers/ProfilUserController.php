<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfilUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profil.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request data
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'phoneNumber' => 'nullable|string|max:15',
                'password' => 'nullable|string|min:8'
            ],
            [
                // Error messages
                'name.required' => 'Nama wajib diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',

                'phoneNumber.string' => 'Nomor HP harus berupa teks.',
                'phoneNumber.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',

                'password.string' => 'Kata sandi harus berupa teks.',
                'password.min' => 'Kata sandi harus memiliki minimal 8 karakter.',
            ]
        );

        // Update the user data
        $user->name = $request->input('name');
        $user->phoneNumber = $request->input('phoneNumber');

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Save the user data
        $user->save();

        // Redirect back with a success message
        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function upgrade()
    {
        $user = Auth::user();

        $user->roleId = 4;
        $user->save();

        return redirect()->route('profil.index')->with('success', 'Akun berhasil diupgrade, silahkan tunggu konfirmasi dari admin.');
    }
}
