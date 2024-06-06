<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $jenisTransaksi = $request->input('jenis_transaksi');
        $user_id = Auth::id();

        $query = Transaksi::where('id_user', $user_id);

        if ($startDate && $endDate) {
            $query->whereBetween('tanggal_transaksi', [$startDate, $endDate]);
        }

        if ($jenisTransaksi) {
            $query->where('jenis_transaksi', $jenisTransaksi);
        }

        $transaksi = $query->with('kategori')->get();

        // Menghitung total nominal berdasarkan jenis transaksi
        $totalPemasukan = $transaksi->where('jenis_transaksi', 'Pendapatan')->sum('nominal_transaksi');
        $totalPengeluaran = $transaksi->where('jenis_transaksi', 'Pengeluaran')->sum('nominal_transaksi');

        return view('laporan.index', compact('transaksi', 'startDate', 'endDate', 'totalPemasukan', 'totalPengeluaran','jenisTransaksi'));
    }

    public function print(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $jenisTransaksi = $request->input('jenis_transaksi');
        $user_id = Auth::id();

        $query = Transaksi::where('id_user', $user_id);

        if ($startDate && $endDate) {
            $query->whereBetween('tanggal_transaksi', [$startDate, $endDate]);
        }

        if ($jenisTransaksi) {
            $query->where('jenis_transaksi', $jenisTransaksi);
        }

        $transaksi = $query->with('kategori')->get();

        // Menghitung total nominal berdasarkan jenis transaksi
        $totalPemasukan = $transaksi->where('jenis_transaksi', 'Pendapatan')->sum('nominal_transaksi');
        $totalPengeluaran = $transaksi->where('jenis_transaksi', 'Pengeluaran')->sum('nominal_transaksi');

        return view('laporan.print', compact('transaksi', 'startDate', 'endDate', 'totalPemasukan', 'totalPengeluaran','jenisTransaksi'));
    }
}
