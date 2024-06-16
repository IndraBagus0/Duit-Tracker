<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentReminder;
use Illuminate\Support\Facades\Auth;

class PaymentReminderController extends Controller
{
    public function index()
    {
        // Mengambil semua data pengingat pembayaran untuk user yang sedang login
        $PaymentReminders = PaymentReminder::where('userId', Auth::id())->get();
        $totalTunggakan = $this->getTotalTunggakan();

        return view('paymentReminder.index', compact('PaymentReminders', 'totalTunggakan'));
    }


    public function create()
    {
        return view('paymentReminder.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reminderDate' => 'required|date',
            'nominal' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $user_role = $user->roleId;

        if (in_array($user_role, [2, 4])) {
            $transaksi_count = PaymentReminder::where('userId', $user_id)->where('status', 'Belum Lunas')->count();
            if ($transaksi_count >= 5) {
                return redirect()->back()->with('error', 'Anda hanya dapat menginputkan maksimal 5 data. Silahkan Upgrade ke premium');
            }
        }
        PaymentReminder::create([
            'reminderDate' => $request->reminderDate,
            'nominal' => $request->nominal,
            'description' => $request->description,
            'status' => 'Belum Lunas',
            'userId' => Auth::id(),
        ]);

        return redirect()->route('paymentReminder.index')
            ->with('success', 'Pengingat pembayaran berhasil ditambahkan.');
    }

    public function markAsPaid($id)
    {
        $reminder = PaymentReminder::find($id);

        // Pastikan hanya user yang memiliki pengingat pembayaran yang bisa mengubah status
        if ($reminder && $reminder->userId == Auth::id()) {
            $reminder->status = 'Terbayar';
            $reminder->save();
        }

        return redirect()->route('paymentReminder.index')
            ->with('success', 'Pembayaran telah berhasil, Lunas!');
    }

    public function getTotalTunggakan()
    {
        // Mengambil total tunggakan dengan status "Belum Lunas" untuk user yang sedang login
        $totalTunggakan = PaymentReminder::where('userId', Auth::id())
            ->where('status', 'Belum Lunas')
            ->sum('nominal');

        return $totalTunggakan;
    }
}
