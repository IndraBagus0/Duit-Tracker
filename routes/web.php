<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;

Route::get('/transaksi/pendapatan', [TransaksiController::class, 'pendapatan'])->name('pendapatan');
Route::get('/transaksi/pengeluaran', [TransaksiController::class, 'pengeluaran'])->name('pengeluaran');

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
    Route::delete('/kategori/{id_kategori}/delete', [KategoriController::class, 'destroy'])->name('deleteKategori');
    Route::get('/users', [DataUserController::class, 'index'])->name('daftarUser');
    Route::get('/users/create', [DataUserController::class, 'create'])->name('createUser');
    Route::post('/users/create', [DataUserController::class, 'store'])->name('storeUser');
    Route::get('/users/{id}/edit', [DataUserController::class, 'edit'])->name('editUser');
    Route::post('/users/{id}/edit', [DataUserController::class, 'update'])->name('updateUser');
    Route::delete('/users/{id}/delete', [DataUserController::class, 'destroy'])->name('deleteUser');
    Route::get('/kategori/{id_kategori}/delete', [KategoriController::class, 'destroy'])->name('deleteKategori');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/print', [LaporanController::class, 'print'])->name('laporan.print');
});

Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
});
