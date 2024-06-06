<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengingatPembayaran;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Group by month and sum the nominal
        $pemasukan = PengingatPembayaran::selectRaw('MONTH(tanggal_pengingat) as month, SUM(nominal) as total')
                            ->groupBy('month')
                            ->pluck('total', 'month')->toArray();

        // Ensure all months are represented
        $months = range(1, 12);
        $monthlyPemasukan = [];
        foreach ($months as $month) {
            $monthlyPemasukan[$month] = $pemasukan[$month] ?? 0;
        }

        // Get all pengingat pembayaran data
        $pengingatPembayaran = PengingatPembayaran::all();

        return view('dashboard.index', compact('monthlyPemasukan', 'pengingatPembayaran'));
    }
}
