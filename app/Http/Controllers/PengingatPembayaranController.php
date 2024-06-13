<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengingatPembayaran;
use Illuminate\Support\Facades\Auth;

class PengingatPembayaranController extends Controller
{
    public function index()
    {
        // Mengambil semua data pengingat pembayaran untuk user yang sedang login
        $pengingatPembayarans = PengingatPembayaran::where('id_user', Auth::id())->get();
        return view('pengingat_pembayaran.index', compact('pengingatPembayarans'));
    }

    public function create()
    {
        return view('pengingat_pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pengingat' => 'required|date',
            'nominal' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $user_role = $user->id_role;

        // Tambahkan logika untuk membatasi jumlah data
        if (in_array($user_role, [2, 4])) {
            $unpaid_count = PengingatPembayaran::where('id_user', $user_id)
                                                ->where('status', 'unpaid')
                                                ->count();
            if ($unpaid_count >= 5) {
                return redirect()->back()->with('error', 'Anda hanya dapat menginputkan maksimal 5 pengingat pembayaran yang belum dibayar. Silahkan upgrade ke premium');
            }
        }

        $saldo = preg_replace('/[^0-9]/', '', $request->nominal);

        PengingatPembayaran::create([
            'tanggal_pengingat' => $request->tanggal_pengingat,
            'nominal' => $saldo,
            'deskripsi' => $request->deskripsi,
            'status' => 'unpaid',
            'id_user' => $user_id,
        ]);

        return redirect()->route('pengingat_pembayaran.index')
            ->with('success', 'Pengingat pembayaran berhasil ditambahkan.');
    }

    public function markAsPaid($id)
    {
        $pengingat = PengingatPembayaran::find($id);

        // Pastikan hanya user yang memiliki pengingat pembayaran yang bisa mengubah status
        if ($pengingat && $pengingat->id_user == Auth::id()) {
            $pengingat->status = 'paid';
            $pengingat->save();
        }

        return redirect()->route('pengingat_pembayaran.index')
            ->with('success', 'Pengingat pembayaran berhasil diperbarui menjadi paid.');
    }
}
