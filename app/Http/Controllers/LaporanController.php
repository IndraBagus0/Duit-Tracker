<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $dateRange = $request->input('date_range');
        $jenisTransaksi = $request->input('jenis_transaksi');

        $startDate = null;
        $endDate = null;
        if ($dateRange) {
            $dates = explode(' to ', $dateRange);
            if (count($dates) == 2) {
                $startDate = Carbon::parse($dates[0])->toDateString();
                $endDate = Carbon::parse($dates[1])->toDateString();
            } else {
                return redirect()->back()->with('error', 'Harap Masukan Rentang Waktu');
            }

            $query = Transaksi::where('id_user', Auth::user()->id)
                ->whereBetween('tanggal_transaksi', [$startDate, $endDate]);
        } else {
            $query = Transaksi::where('id_user', Auth::user()->id);
        }

        if ($jenisTransaksi) {
            $query->where('jenis_transaksi', $jenisTransaksi);
        }

        $transaksi = $query->with('kategori')->get();

        // Menghitung total nominal berdasarkan jenis transaksi
        $totalPemasukan = $transaksi->where('jenis_transaksi', 'Pendapatan')->sum('nominal_transaksi');
        $totalPengeluaran = $transaksi->where('jenis_transaksi', 'Pengeluaran')->sum('nominal_transaksi');
        $saldoAwal = $user->saldo;
        $totalSaldo = $user->saldo + $totalPemasukan - $totalPengeluaran;

        return view('laporan.index', compact('transaksi', 'startDate', 'endDate', 'totalPemasukan', 'totalPengeluaran', 'jenisTransaksi', 'saldoAwal', 'totalSaldo'));
    }


    public function print(Request $request)
    {
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));
        $jenisTransaksi = $request->input('jenis_transaksi');
        $user = Auth::user();

        $query = Transaksi::where('id_user', $user->id);

        if ($startDate && $endDate) {
            $query->whereBetween('tanggal_transaksi', [$startDate->startOfDay(), $endDate->endOfDay()]);
        }

        if ($jenisTransaksi) {
            $query->where('jenis_transaksi', $jenisTransaksi);
        }

        $transaksi = $query->with('kategori')->get();

        // Menghitung total nominal berdasarkan jenis transaksi
        $totalPemasukan = $transaksi->where('jenis_transaksi', 'Pendapatan')->sum('nominal_transaksi');
        $totalPengeluaran = $transaksi->where('jenis_transaksi', 'Pengeluaran')->sum('nominal_transaksi');
        $saldoAwal = $user->saldo;
        $totalSaldo = $user->saldo + $totalPemasukan - $totalPengeluaran;

        return view('laporan.print', compact('transaksi', 'startDate', 'endDate', 'totalPemasukan', 'totalPengeluaran', 'jenisTransaksi', 'saldoAwal', 'totalSaldo'));
    }
}
