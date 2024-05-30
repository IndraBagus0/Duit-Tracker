<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function pendapatan()
    {
        return view('transaksi.pendapatan');
    }

    public function pengeluaran()
    {
        return view('transaksi.pengeluaran');
    }
}