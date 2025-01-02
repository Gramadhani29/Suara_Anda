<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoktorController;
use App\Http\Controllers\PsikologController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PDFController;

// Rute untuk halaman utama dan login
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/user/dashboard', [AuthController::class, 'userDashboard'])->name('user.dashboard');

// For Admin
Route::get('/admin/manage-psikolog',[PsikologController::class,'index'])->name('admin.manage-psikolog');
Route::get('/admin/form-psikolog',[PsikologController::class,'create'])->name('admin.create-psikolog');
Route::post('/admin/store-psikolog',[PsikologController::class,'store'])->name('admin.store-psikolog');
Route::delete('/admin/delete-psikolog/{id}',[PsikologController::class,'destroy'])->name('admin.delete-psikolog');
Route::get('/admin/edit-psikolog/{id}',[PsikologController::class,'edit'])->name('admin.edit-psikolog');
Route::put('/admin/update-psikolog/{id}',[PsikologController::class,'update'])->name('admin.update-psikolog');

Route::get('admin/manage-psikolog/{id}/jadwal',[JadwalController::class,'index'])->name('admin.manage-jadwal');
Route::get('admin/manage-psikolog/{id}/form-jadwal',[JadwalController::class,'create'])->name('admin.create-jadwal');
Route::post('admin/manage-psikolog/{id}/store-jadwal',[JadwalController::class,'store'])->name('admin.store-jadwal');
Route::delete('/admin/manage-psikolog/{id}/delete-jadwal/{id_jadwal}',[JadwalController::class,'destroy'])->name('admin.delete-jadwal');
Route::get('/admin/manage-psikolog/{id}/edit-jadwal/{id_jadwal}',[JadwalController::class,'edit'])->name('admin.edit-jadwal');
Route::put('/admin/manage-psikolog/{id}/update-jadwal/{id_jadwal}',[JadwalController::class,'update'])->name('admin.update-jadwal');

// For User
Route::get('/user/list-psikolog',[BookingController::class,'listPsikolog'])->name('user.list-psikolog');
Route::get('/user/list-psikolog/{id}/form-booking',[BookingController::class,'formBooking'])->name('user.form-booking');
Route::post('/user/list-psikolog/{id}/store-booking',[BookingController::class,'storeBooking'])->name('user.store-booking');
Route::get('/user/my-booking',[BookingController::class,'myBooking'])->name('user.my-booking');
Route::delete('/user/delete-booking/{id}',[BookingController::class,'destroyBooking'])->name('user.delete-booking');

Route::post('/user/generate-my-booking',[PDFController::class,'generateMyBookings'])->name('user.generate-my-booking');
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
