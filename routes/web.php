<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengingatPembayaranController;
use App\Http\Controllers\DashboardController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'dologin']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/redirect', [RedirectController::class, 'cek'])->name('redirect');

Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    
    Route::get('/kategori', [KategoriController::class, 'index'])->name('daftarKategori');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('createKategori');
    Route::post('/kategori/create', [KategoriController::class, 'store'])->name('storeKategori');
    Route::get('/kategori/{id_kategori}/edit', [KategoriController::class, 'edit'])->name('editKategori');
    Route::post('/kategori/{id_kategori}/edit', [KategoriController::class, 'update'])->name('updateKategori');
    Route::get('/kategori/{id_kategori}/delete', [KategoriController::class, 'destroy'])->name('deleteKategori');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/print', [LaporanController::class, 'print'])->name('laporan.print');

});

Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
});
//pengingat_pembayaran
Route::middleware(['auth'])->group(function () {
    Route::get('/pengingat_pembayaran', [PengingatPembayaranController::class, 'index'])->name('pengingat_pembayaran.index');
    Route::get('/pengingat_pembayaran/create', [PengingatPembayaranController::class, 'create'])->name('pengingat_pembayaran.create');
    Route::post('/pengingat_pembayaran', [PengingatPembayaranController::class, 'store'])->name('pengingat_pembayaran.store');
});

//dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



