<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class ReportController extends Controller
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
            $query = Transaction::where('userId', Auth::user()->id)
                ->whereBetween('transactionDate', [$startDate, $endDate]);
        } else {
            $query = Transaction::where('userId', Auth::user()->id);
        }

        if ($jenisTransaksi) {
            $query->where('jenis_transaksi', $jenisTransaksi);
        }

        $transaksi = $query->with('kategori')->get();

        // Menghitung total nominal berdasarkan jenis transaksi
        $totalPemasukan = $transaksi->where('transactionType', 'Pemasukan')->sum('transactionAmount');
        $totalPengeluaran = $transaksi->where('transactionType', 'Pengeluaran')->sum('transactionAmount');
        $saldoAwal = $user->accountBalance;
        $totalSaldo = $user->accountBalance + $totalPemasukan - $totalPengeluaran;

        return view('report.index', compact('transaksi', 'startDate', 'endDate', 'totalPemasukan', 'totalPengeluaran', 'jenisTransaksi', 'saldoAwal', 'totalSaldo'));
    }


    public function print(Request $request)
    {
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));
        $jenisTransaksi = $request->input('jenis_transaksi');
        $user = Auth::user();

        $query = Transaction::where('userId', $user->id);

        if ($startDate && $endDate) {
            $query->whereBetween('transactionDate', [$startDate->startOfDay(), $endDate->endOfDay()]);
        }

        if ($jenisTransaksi) {
            $query->where('jenis_transaksi', $jenisTransaksi);
        }

        $transaksi = $query->with('kategori')->get();

        // Menghitung total nominal berdasarkan jenis transaksi
        $totalPemasukan = $transaksi->where('transactionType', 'Pemasukan')->sum('transactionAmount');
        $totalPengeluaran = $transaksi->where('transactionType', 'Pengeluaran')->sum('transactionAmount');
        $saldoAwal = $user->accountBalance;
        $totalSaldo = $user->accountBalance + $totalPemasukan - $totalPengeluaran;

        return view('report.print', compact('transaksi', 'startDate', 'endDate', 'totalPemasukan', 'totalPengeluaran', 'jenisTransaksi', 'saldoAwal', 'totalSaldo'));
    }

    public function getReportData(Request $request)
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
                return response()->json(['error' => 'Harap Masukan Rentang Waktu'], 400);
            }

            $query = Transaction::where('userId', $user->id)
                ->whereBetween('transactionDate', [$startDate, $endDate]);
        } else {
            $query = Transaction::where('userId', $user->id);
        }

        if ($jenisTransaksi) {
            $query->where('jenis_transaksi', $jenisTransaksi);
        }

        $transaksi = $query->with('kategori')->get();

        // Menghitung total nominal berdasarkan jenis transaksi
        $totalPemasukan = $transaksi->where('transactionType', 'Pemasukan')->sum('transactionAmount');
        $totalPengeluaran = $transaksi->where('transactionType', 'Pengeluaran')->sum('transactionAmount');
        $saldoAwal = $user->accountBalance;
        $totalSaldo = $user->accountBalance;
        +$totalPemasukan - $totalPengeluaran;

        return [
            'transaksi' => $transaksi,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'jenisTransaksi' => $jenisTransaksi,
            'saldoAwal' => $saldoAwal,
            'totalSaldo' => $totalSaldo
        ];
    }
}
