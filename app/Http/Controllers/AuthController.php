<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dologin(Request $request) {
        // validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (auth()->attempt($credentials)) {
            // buat ulang session login
            $request->session()->regenerate();
    
            if (auth()->user()->id_role === 1) {
                // jika user superadmin
                return redirect()->route('admin');
            } else {
                // jika user pegawai
                return redirect()->route('user');
            }
        }
    
        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }
    
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}