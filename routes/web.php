<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DataUserController;


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

    Route::get('/users', [DataUserController::class, 'index'])->name('daftarUser');
    Route::get('/users/create', [DataUserController::class, 'create'])->name('createUser');
    Route::post('/users/create', [DataUserController::class, 'store'])->name('storeUser');
    Route::get('/users/{id}/edit', [DataUserController::class, 'edit'])->name('editUser');
    Route::post('/users/{id}/edit', [DataUserController::class, 'update'])->name('updateUser');
    Route::get('/users/{id}/delete', [DataUserController::class, 'destroy'])->name('deleteUser');
});

Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
});
