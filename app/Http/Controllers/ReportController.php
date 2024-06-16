<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;

class ReportController extends Controller
{
    public function __construct()
    {
        // Set locale ke bahasa Indonesia
        Carbon::setLocale('id');
    }

    public function index(Request $request)
    {
        $reportData = $this->getReportData(
            Auth::user(),
            $request->input('date_range'),
            $request->input('jenis_transaksi')
        );

        return view('report.index', $reportData);
    }

    public function print(Request $request)
    {
        $reportData = $this->getReportData(
            Auth::user(),
            $request->input('date_range'),
            $request->input('jenis_transaksi'),
            $request->input('start_date'),
            $request->input('end_date')
        );

        return view('report.print', $reportData);
    }

    public function getReportData(User $user, $dateRange = null, $jenisTransaksi = null, $startDate = null, $endDate = null)
    {
        $query = Transaction::where('userId', $user->id);

        if ($dateRange) {
            $dates = explode(' to ', $dateRange);
            if (count($dates) == 2) {
                $startDate = Carbon::parse($dates[0])->startOfDay();
                $endDate = Carbon::parse($dates[1])->endOfDay();
            } else {
                return redirect()->back()->with('error', 'Harap Masukkan Rentang Waktu yang Benar');
            }
        } else {
            $startDate = $startDate ? Carbon::parse($startDate)->startOfDay() : Carbon::now()->startOfMonth();
            $endDate = $endDate ? Carbon::parse($endDate)->endOfDay() : Carbon::now()->endOfMonth();
        }

        if ($startDate && $endDate) {
            $query->whereBetween('transactionDate', [$startDate, $endDate]);
        }

        if ($jenisTransaksi) {
            $query->where('transactionType', $jenisTransaksi);
        }

        $transaksi = $query->with('kategori')->orderBy('transactionDate', 'asc')->get();

        // Menghitung total nominal berdasarkan jenis transaksi
        $totalPemasukan = $transaksi->where('transactionType', 'Pemasukan')->sum('transactionAmount');
        $totalPengeluaran = $transaksi->where('transactionType', 'Pengeluaran')->sum('transactionAmount');
        $saldoAwal = $user->accountBalance;
        $totalSaldo = $saldoAwal + $totalPemasukan - $totalPengeluaran;

        // Dapatkan bulan saat ini dalam format bahasa Indonesia
        $bulanSaatIni = Carbon::now()->translatedFormat('F Y');

        return compact('transaksi', 'dateRange', 'startDate', 'endDate', 'totalPemasukan', 'totalPengeluaran', 'jenisTransaksi', 'saldoAwal', 'totalSaldo', 'bulanSaatIni');
    }
}
