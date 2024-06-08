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
        return view('paymentReminder.index', compact('PaymentReminders'));
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
            'description' => 'nullable|string',
        ]);

        PaymentReminder::create([
            'reminderDate' => $request->reminderDate,
            'nominal' => $request->nominal,
            'description' => $request->description,
            'status' => 'unpaid',
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
            $reminder->status = 'paid';
            $reminder->save();
        }

        return redirect()->route('paymentReminder.index')
            ->with('success', 'Pembayaran telah berhasil, Lunas!');
    }
}
