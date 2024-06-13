<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        // jumlah pengguna
        $totalUsers = User::where('roleId', '!=', 1)->count();
        // total pemasukan dan total pengeluaran
        $totalIncome = Transaction::where('transactionType', 'Pemasukan')->sum('transactionAmount');
        $totalOutcome = Transaction::where('transactionType', 'Pengeluaran')->sum('transactionAmount');
        // total pengguna yang meminta upgrade status
        $updatePending = User::where('roleId', '=', 4)->count();
        // status pengguna baru dan pengguna upgrade status
        $userStatus = User::whereIn('roleId', [4, 2])
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();
        // chart Tipe Pengguna
        $countPremium = User::where('roleId', 3)->count();
        $countFree = User::where('roleId', 2)->count();
        $totalUser = $countPremium + $countFree;
        $percentagePremium = ($countPremium / $totalUser) * 100;
        $percentageFree = ($countFree / $totalUser) * 100;
        // Chart Aktivitas Pengguna baru
        $startDate = Carbon::now()->subDays(7);
        $endDate = Carbon::now();

        $newUser = User::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Log the raw data from the query
        Log::info('Raw New User Data: ' . json_encode($newUser->toArray()));

        $dates = $newUser->pluck('date');
        $userCounts = $newUser->pluck('count');

        // Log dates
        Log::info('Dates: ' . json_encode($dates->toArray()));

        // Log user counts
        Log::info('User Counts: ' . json_encode($userCounts->toArray()));

        return view('dashboard.adminDB', [
            'jmlhPengguna' => $totalUsers,
            'totalPemasukan' => $totalIncome,
            'totalPengeluaran' => $totalOutcome,
            'updateStatus' => $updatePending,
            'userUpdate' => $userStatus,
            'premiumUser' => $percentagePremium,
            'freeUser' => $percentageFree,
            'dates' => $dates,
            'userCounts' => $userCounts,
        ]);
    }
}
