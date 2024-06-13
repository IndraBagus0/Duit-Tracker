<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:30|unique:tbl_users',
            'password' => 'required|string|min:8|confirmed',
            'phoneNumber' => 'required|string|max:15',
            'accountBalance' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Something went wrong!');
        }

        $accountBalance = preg_replace('/[^0-9]/', '', $request->accountBalance);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phoneNumber' => $request->phoneNumber,
            'accountBalance' => $accountBalance,
            'roleId' => 2,
        ]);

        return redirect()->route('register')->with('success', 'You have successfully registered!');
    }
}
