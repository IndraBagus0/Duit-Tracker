<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengingatPembayaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProfilUserController;
use App\Http\Controllers\ContactController;



Route::get('/', function () {
    return view('index');
});
//Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


//login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'dologin']);


//logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//lupa Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot_password-action', [ForgotPasswordController::class, 'forgot_password_action'])->name('forgot-password-action');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'reset_password'])->name('reset-password');
Route::post('/reset-password-action', [ForgotPasswordController::class, 'reset_password_action'])->name('reset-password-action');

//Send Email
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

//session
Route::get('/redirect', [RedirectController::class, 'cek'])->name('redirect');

Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('daftarKategori');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('createKategori');
    Route::post('/kategori/create', [KategoriController::class, 'store'])->name('storeKategori');
    Route::get('/kategori/{id_kategori}/edit', [KategoriController::class, 'edit'])->name('editKategori');
    Route::post('/kategori/{id_kategori}/edit', [KategoriController::class, 'update'])->name('updateKategori');
    Route::get('/kategori/{id_kategori}/delete', [KategoriController::class, 'destroy'])->name('deleteKategori');
    Route::delete('/kategori/{id_kategori}/delete', [KategoriController::class, 'destroy'])->name('deleteKategori');
    Route::get('/users', [DataUserController::class, 'index'])->name('daftarUser');
    Route::get('/users/create', [DataUserController::class, 'create'])->name('createUser');
    Route::post('/users/create', [DataUserController::class, 'store'])->name('storeUser');
    Route::get('/users/{id}/edit', [DataUserController::class, 'edit'])->name('editUser');
    Route::post('/users/{id}/edit', [DataUserController::class, 'update'])->name('updateUser');
    Route::delete('/users/{id}/delete', [DataUserController::class, 'destroy'])->name('deleteUser');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/print', [LaporanController::class, 'print'])->name('laporan.print');
});

Route::group(['middleware' => ['auth', 'checkrole:2,3,4']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/print', [LaporanController::class, 'print'])->name('laporan.print');
    Route::get('/profil', [ProfilUserController::class, 'index'])->name('profil');
    Route::post('/profil', [ProfilUserController::class, 'update'])->name('profil.update');
    Route::get('/profil/upgrade', [ProfilUserController::class, 'upgrade'])->name('profil.upgrade');
    Route::get('/transaksi/pendapatan', [TransaksiController::class, 'pendapatan'])->name('pendapatan');
    Route::get('/transaksi/pendapatan/create', [TransaksiController::class, 'create'])->name('createIncome')->defaults('type', 'pendapatan');
    Route::post('/transaksi/pendapatan', [TransaksiController::class, 'store'])->name('saveIncome');
    Route::get('/transaksi/pengeluaran', [TransaksiController::class, 'pengeluaran'])->name('pengeluaran');
    Route::post('/transaksi/pengeluaran', [TransaksiController::class, 'store'])->name('saveOutcome');
    Route::get('/transaksi/pengeluaran/create', [TransaksiController::class, 'create'])->name('createOutcome')->defaults('type', 'pengeluaran');
    Route::get('/transaksi/kategori', [KategoriController::class, 'index'])->name('idKategori');
});
//pengingat_pembayaran
Route::middleware(['auth'])->group(function () {
    Route::get('/pengingat_pembayaran', [PengingatPembayaranController::class, 'index'])->name('pengingat_pembayaran.index');
    Route::get('/pengingat_pembayaran/create', [PengingatPembayaranController::class, 'create'])->name('pengingat_pembayaran.create');
    Route::post('/pengingat_pembayaran', [PengingatPembayaranController::class, 'store'])->name('pengingat_pembayaran.store');
    Route::post('/pengingat_pembayaran/markAsPaid/{id}', [PengingatPembayaranController::class, 'markAsPaid'])->name('pengingat_pembayaran.markAsPaid');
});

//dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



