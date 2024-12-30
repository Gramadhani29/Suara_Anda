<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoktorController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/user/dashboard', [AuthController::class, 'userDashboard'])->name('user.dashboard');

Route::get('/admin/manage-doctor',[DoktorController::class,'index'])->name('admin.manage-doctor');
Route::get('/admin/form-doctor',[DoktorController::class,'create'])->name('admin.create-doctor');
Route::post('/admin/store-doctor',[DoktorController::class,'store'])->name('admin.store-doctor');
Route::delete('/admin/delete-doctor/{id}',[DoktorController::class,'destroy'])->name('admin.delete-doctor');
Route::get('/admin/edit-doctor/{id}',[DoktorController::class,'edit'])->name('admin.edit-doctor');
Route::put('/admin/update-doctor/{id}',[DoktorController::class,'update'])->name('admin.update-doctor');