<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentReminderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('index');
});

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'dologin']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot_password-action', [ForgotPasswordController::class, 'forgot_password_action'])->name('forgot-password-action');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'reset_password'])->name('reset-password');
Route::post('/reset-password-action', [ForgotPasswordController::class, 'reset_password_action'])->name('reset-password-action');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Session
Route::get('/redirect', [RedirectController::class, 'cek'])->name('redirect');

Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/kategori', [CategoryController::class, 'index'])->name('daftarKategori');
    Route::get('/kategori/create', [CategoryController::class, 'create'])->name('createKategori');
    Route::post('/kategori/create', [CategoryController::class, 'store'])->name('storeKategori');
    Route::get('/kategori/{id_kategori}/edit', [CategoryController::class, 'edit'])->name('editKategori');
    Route::post('/kategori/{id_kategori}/edit', [CategoryController::class, 'update'])->name('updateKategori');
    Route::get('/kategori/{id_kategori}/delete', [CategoryController::class, 'destroy'])->name('deleteKategori');
    Route::delete('/kategori/{id_kategori}/delete', [CategoryController::class, 'destroy'])->name('deleteKategori');
    Route::get('/users', [DataUserController::class, 'index'])->name('daftarUser');
    Route::get('/users/create', [DataUserController::class, 'create'])->name('createUser');
    Route::post('/users/create', [DataUserController::class, 'store'])->name('storeUser');
    Route::get('/users/{id}/edit', [DataUserController::class, 'edit'])->name('editUser');
    Route::post('/users/{id}/edit', [DataUserController::class, 'update'])->name('updateUser');
    Route::delete('/users/{id}/delete', [DataUserController::class, 'destroy'])->name('deleteUser');
    Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/print', [ReportController::class, 'print'])->name('laporan.print');
});

Route::group(['middleware' => ['auth', 'checkrole:2,3,4']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/print', [ReportController::class, 'print'])->name('laporan.print');
    Route::get('/profil', [ProfileUserController::class, 'index'])->name('profile.index');
    Route::post('/profil/update', [ProfileUserController::class, 'update'])->name('profile.update');
    Route::get('/profil/upgrade', [ProfileUserController::class, 'upgrade'])->name('profile.upgrade');
    Route::get('/transaksi/pemasukan', [TransactionController::class, 'pemasukan'])->name('pemasukan');
    Route::get('/transaksi/pemasukan/create', [TransactionController::class, 'create'])->name('createIncome')->defaults('type', 'pemasukan');
    Route::post('/transaksi/pemasukan', [TransactionController::class, 'store'])->name('saveIncome');
    Route::get('/transaksi/pengeluaran', [TransactionController::class, 'pengeluaran'])->name('pengeluaran');
    Route::post('/transaksi/pengeluaran', [TransactionController::class, 'store'])->name('saveOutcome');
    Route::get('/transaksi/pengeluaran/create', [TransactionController::class, 'create'])->name('createOutcome')->defaults('type', 'pengeluaran');
    Route::get('/transaksi/kategori', [CategoryController::class, 'index'])->name('idKategori');
});

// Payment Reminder
Route::middleware(['auth'])->group(function () {
    Route::get('/pengingat-pembayaran', [PaymentReminderController::class, 'index'])->name('paymentReminder.index');
    Route::get('/pengingat-pembayaran/create', [PaymentReminderController::class, 'create'])->name('paymentReminder.create');
    Route::post('/pengingat-pembayaran', [PaymentReminderController::class, 'store'])->name('paymentReminder.store');
    Route::post('/pengingat-pembayaran/markAsPaid/{id}', [PaymentReminderController::class, 'markAsPaid'])->name('paymentReminder.markAsPaid');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
