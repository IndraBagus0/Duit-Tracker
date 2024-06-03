<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
use App\Models\password_resets;
use App\Mail\ResetPasswordMail;

class ForgotPasswordController extends Controller
{
    public function forgot_password()
    {
       return view('auth.forgot-password');
    }

    public function forgot_password_action(Request $request)
    {
        $customMessage = [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.exists' => 'Email tidak terdaftar di database',
        ];
    
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], $customMessage);
    
        $token = Str::random(60);
    
        password_resets::updateOrCreate(
            [
                'email' => $request->email
            ],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]
        );
    
        Mail::to($request->email)->send(new ResetPasswordMail($token));
    
        return redirect()->route('forgot-password')->with('success', 'Kami telah mengirimkan link reset password ke email anda');
    }
    
    

    public function reset_password(Request $request, $token)
{
    $getToken = password_resets::where('token', $token)->first();

    if (!$getToken) {
        return redirect()->route('login')->with('failed', 'Token tidak valid');
    }

    return view('auth.forgot-password-link', compact('token'));
}

public function reset_password_action(Request $request)
{
    $customMessage = [
        'password.required' => 'Password tidak boleh kosong',
        'password.min' => 'Password minimal 6 karakter',
    ];

    $request->validate([
        'password' => 'required|min:8'
    ], $customMessage);

    $token = password_resets::where('token', $request->token)->first();

    if (!$token) {
        return redirect()->route('login')->with('failed', 'Token tidak valid');
    }

    $user = User::where('email', $token->email)->first();

    if (!$user) {
        return redirect()->route('login')->with('failed', 'Email tidak terdaftar di database');
    }

    $user->update([
        'password' => Hash::make($request->password)
    ]);

    $token->delete();

    return redirect()->route('login')->with('success', 'Password berhasil direset');
}

}
