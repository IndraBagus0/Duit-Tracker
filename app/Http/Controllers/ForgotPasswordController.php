<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\password_resets;
use App\Mail\ResetPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function forgot_password()
    {
        return view('auth.forgot-password');
    }

    public function forgot_password_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $email = $request->email;
        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::to($email)->send(new ResetPasswordMail($token));

        return back()->with('success', 'Link reset password telah dikirim ke email Anda.');
    }

    public function reset_password($token)
    {
        return view('auth.forgot-password-link', ['token' => $token]);
    }

    public function reset_password_action(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $tokenData = DB::table('password_resets')
            ->where('token', $request->token)
            ->first();

        if (!$tokenData) {
            return back()->with('error', 'Token tidak valid atau telah kedaluwarsa.');
        }

        $user = User::where('email', $tokenData->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        $user->password = Hash::make($request->password);
        $user->save();


        DB::table('password_resets')->where('email', $user->email)->delete();

        return back()->with('success', 'Kata sandi Anda telah berhasil direset.');
    }
}
