<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoktorController;
use App\Http\Controllers\PsikologController;
use App\Http\Controllers\JadwalController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/user/dashboard', [AuthController::class, 'userDashboard'])->name('user.dashboard');

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