<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function pemasukan()
    {
        $kategori = category::all();
        return view('transaction.income', compact('kategori'));
    }

    public function pengeluaran()
    {
        $kategori = category::all();
        return view('transaction.outcome', compact('kategori'));
    }

    public function create($type)
    {
        $kategori = category::all();

        if ($type == 'pemasukan') {
            return view('transaction.income', compact('kategori'));
        } elseif ($type == 'pengeluaran') {
            return view('transaction.outcome', compact('kategori'));
        } else {
            abort(404);
        }
    }

    public function store(Request $request)
    {
        // Logging request data for debugging
        Log::info('Request data:', $request->all());

        $request->validate([
            'transactionDate' => 'required|date',
            'transactionAmount' => 'required|numeric',
            'notesTransaction' => 'nullable|string',
            'transactionType' => 'required|in:Pemasukan,Pengeluaran',
            'categoryId' => 'required|exists:tbl_category,categoryId',
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $user_role = $user->roleId;

        if (in_array($user_role, [2, 4])) {
            $transaksi_count = Transaction::where('userId', $user_id)->count();
            if ($transaksi_count >= 5) {
                return redirect()->back()->with('error', 'Anda hanya dapat menginputkan maksimal 5 data.');
            }
        }

        $transaksi = new Transaction();
        $transaksi->transactionDate = $request->transactionDate;
        $transaksi->transactionAmount = $request->transactionAmount;
        $transaksi->notesTransaction = $request->notesTransaction;
        $transaksi->transactionType = $request->transactionType;
        $transaksi->categoryId = $request->categoryId;
        $transaksi->userId = $user_id;

        $transaksi->save();

        // Logging for successful save
        Log::info('Transaksi saved:', $transaksi->toArray());

        if ($request->transactionType == 'Pemasukan') {
            $redirect_route = 'createIncome';
        } else {
            $redirect_route = 'createOutcome';
        }

        return redirect()->route($redirect_route)->with('success', 'Transaksi berhasil disimpan.');
    }
}
