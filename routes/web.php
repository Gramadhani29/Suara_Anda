<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Rute untuk halaman utama dan login
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk admin artikel
Route::get('/admin/artikel', [AdminController::class, 'index'])->name('admin.artikel.index');
Route::get('/admin/artikel/create', [AdminController::class, 'create'])->name('admin.artikel.create');
Route::post('/admin/artikel', [AdminController::class, 'store'])->name('admin.artikel.store');
Route::get('/admin/artikel/{id}', [AdminController::class, 'show'])->name('admin.artikel.show');
Route::get('/admin/artikel/{id}/edit', [AdminController::class, 'edit'])->name('admin.artikel.edit');
Route::put('/admin/artikel/{id}', [AdminController::class, 'update'])->name('admin.artikel.update');
Route::delete('/admin/artikel/{id}', [AdminController::class, 'destroy'])->name('admin.artikel.destroy');

// Rute untuk user dashboard dan artikel
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::get('/user/artikel', [UserController::class, 'artikel'])->name('user.artikel'); // Perbaiki rute ke metode 'artikel'
Route::get('/user/artikel/{id}', [UserController::class, 'artikeldetail'])->name('user.artikel.show');

// Rute untuk admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
