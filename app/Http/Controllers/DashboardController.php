<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengingatPembayaran;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the ID of the logged-in user
        $user_id = Auth::id();

        // Group by month and sum the nominal for the logged-in user
        $pemasukan = PengingatPembayaran::selectRaw('MONTH(tanggal_pengingat) as month, SUM(nominal) as total')
                            ->where('id_user', $user_id)
                            ->groupBy('month')
                            ->pluck('total', 'month')
                            ->toArray();

        // Ensure all months are represented
        $months = range(1, 12);
        $monthlyPemasukan = [];
        foreach ($months as $month) {
            $monthlyPemasukan[$month] = $pemasukan[$month] ?? 0;
        }

        // Get all pengingat pembayaran data for the logged-in user
        $pengingatPembayaran = PengingatPembayaran::where('id_user', $user_id)->get();

        return view('dashboard.index', compact('monthlyPemasukan', 'pengingatPembayaran'));
    }
}
