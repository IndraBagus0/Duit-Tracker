<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentReminderController; // Tambahkan ini
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $reportController;
    private $paymentReminderController;

    public function __construct(ReportController $reportController, PaymentReminderController $paymentReminderController)
    {
        $this->reportController = $reportController;
        $this->paymentReminderController = $paymentReminderController;
    }

    public function index()
    {
        // Ambil semua pengguna beserta relasinya
        $users = User::with(['paymentReminders', 'transaction', 'role'])->get();

        // Panggil getTotalTunggakan dari PaymentReminderController
        $totalTunggakan = $this->paymentReminderController->getTotalTunggakan();

        // Ambil data laporan untuk pengguna yang sedang login
        $reportData = $this->reportController->getReportData(auth()->user());

        // Ambil 4 transaksi terbaru untuk pengguna yang sedang login
        $recentTransactions = Transaction::where('userId', auth()->id())
            ->orderBy('transactionDate', 'desc')
            ->take(4)
            ->get();

        // Menggabungkan data dan mengirimkannya ke tampilan
        return view('user.index', array_merge([
            'users' => $users,
            'recentTransactions' => $recentTransactions,
            'transaksi' => $reportData['transaksi'], // Pastikan data transaksi tersedia untuk frontend
            'bulanSaatIni' => $reportData['bulanSaatIni'], // Kirim bulan saat ini ke tampilan
            'totalTunggakan' => $totalTunggakan // Kirim totalTunggakan ke tampilan
        ], $reportData));
    }
}
