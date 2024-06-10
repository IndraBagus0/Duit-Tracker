<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;

class UserController extends Controller
{
    protected $reportController;

    public function __construct(ReportController $reportController)
    {
        $this->reportController = $reportController;
    }

    public function index(Request $request)
    {
        $reportData = $this->reportController->getReportData($request);

        // Return view with the report data
        return view('user.index', [
            'transaksi' => $reportData['transaksi'],
            'startDate' => $reportData['startDate'],
            'endDate' => $reportData['endDate'],
            'totalPemasukan' => $reportData['totalPemasukan'],
            'totalPengeluaran' => $reportData['totalPengeluaran'],
            'jenisTransaksi' => $reportData['jenisTransaksi'],
            'saldoAwal' => $reportData['saldoAwal'],
            'totalSaldo' => $reportData['totalSaldo']
        ]);
    }
}
