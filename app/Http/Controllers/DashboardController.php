<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentReminder;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the ID of the logged-in user
        $user_id = Auth::id();

        // Group by month and sum the nominal for pemasukan
        $pemasukan = Transaction::selectRaw('MONTH(tanggal_transaksi) as month, SUM(nominal_transaksi) as total')
            ->where('id_user', $user_id)
            ->where('jenis_transaksi', 'Pendapatan')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Group by month and sum the nominal for pengeluaran
        $pengeluaran = Transaction::selectRaw('MONTH(tanggal_transaksi) as month, SUM(nominal_transaksi) as total')
            ->where('id_user', $user_id)
            ->where('jenis_transaksi', 'Pengeluaran')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Ensure all months are represented
        $months = range(1, 12);
        $monthlyPemasukan = [];
        $monthlyPengeluaran = [];
        foreach ($months as $month) {
            $monthlyPemasukan[$month] = $pemasukan[$month] ?? 0;
            $monthlyPengeluaran[$month] = $pengeluaran[$month] ?? 0;
        }

        // Get all pengingat pembayaran data for the logged-in user
        $pengingatPembayaran = PengingatPembayaran::where('id_user', $user_id)
            ->where('status', 'unpaid')
            ->get();

        return view('dashboard.index', compact('monthlyPemasukan', 'monthlyPengeluaran', 'pengingatPembayaran'));
    }
}
