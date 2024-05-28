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
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'saldo' => 0,
            'id_role' => 2,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('daftarUser')->with('success', 'User created successfully.');
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
    
        }
    

    // menghapus user
    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);
        $user->delete();

        return redirect()->route('daftarUser')->with('success', 'User deleted successfully.');
    }

}
