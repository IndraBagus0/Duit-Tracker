<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek()
    {
        if (Auth::user()->roleId === 1) {
            return redirect('/admin');
        } else {
            return redirect('/user');
        }
    }
}
