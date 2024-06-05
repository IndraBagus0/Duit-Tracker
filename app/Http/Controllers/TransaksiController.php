<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
    public function pendapatan()
    {
        $kategori = Kategori::all();
        return view('transaksi.pendapatan', compact('kategori'));
    }

    public function pengeluaran()
    {
        $kategori = Kategori::all();
        return view('transaksi.pengeluaran', compact('kategori'));
    }

    public function create($type)
    {
        $kategori = Kategori::all();

        if ($type == 'pendapatan') {
            return view('transaksi.pendapatan', compact('kategori'));
        } elseif ($type == 'pengeluaran') {
            return view('transaksi.pengeluaran', compact('kategori'));
        } else {
            abort(404);
        }
    }

    public function store(Request $request)
    {
        // Logging request data for debugging
        Log::info('Request data:', $request->all());

        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'nominal_transaksi' => 'required|numeric',
            'catatan_transaksi' => 'nullable|string',
            'jenis_transaksi' => 'required|in:Pendapatan,Pengeluaran',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        $user_id = auth()->id();

        $transaksi = new Transaksi();
        $transaksi->tanggal_transaksi = $request->tanggal_transaksi;
        $transaksi->nominal_transaksi = $request->nominal_transaksi;
        $transaksi->catatan_transaksi = $request->catatan_transaksi;
        $transaksi->jenis_transaksi = $request->jenis_transaksi;
        $transaksi->id_kategori = $request->id_kategori;
        $transaksi->id_user = $user_id;

        $transaksi->save();

        // Logging for successful save
        Log::info('Transaksi saved:', $transaksi->toArray());

        if ($request->jenis_transaksi == 'Pendapatan') {
            $redirect_route = 'createIncome';
        } else {
            $redirect_route = 'createOutcome';
        }

        return redirect()->route($redirect_route)->with('success', 'Transaksi berhasil disimpan.');
    }
}
