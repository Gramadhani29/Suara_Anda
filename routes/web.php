<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoktorController;
use App\Http\Controllers\PsikologController;
use App\Http\Controllers\JadwalController;

// Rute untuk halaman utama dan login
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
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

Route::get('/admin/manage-psikolog',[PsikologController::class,'index'])->name('admin.manage-psikolog');
Route::get('/admin/form-psikolog',[PsikologController::class,'create'])->name('admin.create-psikolog');
Route::post('/admin/store-psikolog',[PsikologController::class,'store'])->name('admin.store-psikolog');
Route::delete('/admin/delete-psikolog/{id}',[PsikologController::class,'destroy'])->name('admin.delete-psikolog');
Route::get('/admin/edit-psikolog/{id}',[PsikologController::class,'edit'])->name('admin.edit-psikolog');
Route::put('/admin/update-psikolog/{id}',[PsikologController::class,'update'])->name('admin.update-psikolog');

Route::get('admin/manage-doktor/{id}/jadwal',[JadwalController::class,'index'])->name('admin.manage-jadwal');
Route::get('admin/manage-doktor/{id}/form-jadwal',[JadwalController::class,'create'])->name('admin.create-jadwal');
Route::post('admin/manage-doktor/{id}/store-jadwal',[JadwalController::class,'store'])->name('admin.store-jadwal');
Route::delete('/admin/manage-doktor/{id}/delete-jadwal/{id_jadwal}',[JadwalController::class,'destroy'])->name('admin.delete-jadwal');
Route::get('/admin/manage-doktor/{id}/edit-jadwal/{id_jadwal}',[JadwalController::class,'edit'])->name('admin.edit-jadwal');
