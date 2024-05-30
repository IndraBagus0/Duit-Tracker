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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'no_hp' => 'required|string|max:15',
            'saldo' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'saldo' => $request->saldo,
            'id_role' => 2,
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
            // Validasi data kecuali password
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                // Validasi password hanya jika diisi
                'password' => 'nullable|string|min:8|confirmed',
            ]);

            // Temukan user berdasarkan ID
            $user = User::findOrFail($id);

            // Update data user kecuali password jika kosong
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];

            if (!empty($validatedData['password'])) {
                $user->password = bcrypt($validatedData['password']);
            }

            // Simpan perubahan
            $user->save();

            // Redirect dengan pesan sukses
            return redirect()->route('daftarUser')->with('success', 'User berhasil diperbarui');
        }

            

    // menghapus user
    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);
        $user->delete();

        return redirect()->route('daftarUser')->with('success', 'User berhasil dihapus');
    }

}
