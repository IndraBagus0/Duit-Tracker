<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DataUserController extends Controller
{
    // menampilkan user
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // menampilkan halaman create user
    public function create()
    {
        return view('users.create');
    }

    //menyimpan data ke database
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255|min:5',
                'email' => 'required|string|email|max:255|unique:tbl_users',
                'phoneNumber' => 'required|string|max:15',
                'accountBalance' => 'required|string|max:15',
                'password' => 'required|string|min:8',
            ],
            [
                // Pesan kesalahan
                'name.required' => 'Nama wajib diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
                'name.min' => 'Nama minimal 5 karakter.',

                'email.required' => 'Email wajib diisi.',
                'email.string' => 'Email harus berupa teks.',
                'email.email' => 'Format email tidak valid.',
                'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
                'email.unique' => 'Email sudah digunakan, silakan pilih email lain.',

                'phoneNumber.required' => 'Nomor HP wajib diisi.',
                'phoneNumber.string' => 'Nomor HP harus berupa teks.',
                'phoneNumber.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',

                'accountBalance.required' => 'Saldo wajib diisi.',
                'accountBalance.string' => 'Saldo harus berupa teks.',
                'accountBalance.max' => 'Saldo tidak boleh lebih dari 15 karakter.',

                'password.required' => 'Kata sandi wajib diisi.',
                'password.string' => 'Kata sandi harus berupa teks.',
                'password.min' => 'Kata sandi harus memiliki minimal 8 karakter.',
            ]
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'accountBalance' => $request->accountBalance,
            'roleId' => 2,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('daftarUser')->with('success', 'User berhasil ditambahkan');
    }

    // menampilkan user berdasarkan id
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // update data
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255|min:5',
                'email' => 'required|string|email|max:255',
                'phoneNumber' => 'required|string|max:15',
                'member_status' => 'nullable|string',
                // Validasi password hanya jika diisi
                'password' => 'nullable|string|min:8',
            ],
            [
                // Pesan kesalahan
                'name.required' => 'Nama wajib diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
                'name.min' => 'Nama minimal 5 karakter.',

                'email.required' => 'Email wajib diisi.',
                'email.string' => 'Email harus berupa teks.',
                'email.email' => 'Format email tidak valid.',
                'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
                'email.unique' => 'Email sudah digunakan, silakan pilih email lain.',

                'phoneNumber.required' => 'Nomor HP wajib diisi.',
                'phoneNumber.string' => 'Nomor HP harus berupa teks.',
                'phoneNumber.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',

                'password.required' => 'Kata sandi wajib diisi.',
                'password.string' => 'Kata sandi harus berupa teks.',
                'password.min' => 'Kata sandi harus memiliki minimal 8 karakter.',
            ]
        );

        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Update data user kecuali password jika kosong
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->roleId = $validatedData['member_status'];
        $user->phoneNumber = $validatedData['phoneNumber'];

        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        // Simpan perubahan
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('daftarUser')->with('success', 'User berhasil diperbarui');
    }



    // menghapus user
    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->route('daftarUser')->with('success', 'User berhasil dihapus');
    }
}
