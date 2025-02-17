<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\supervisor\DashboardController;
use App\Http\Controllers\supervisor\ManagementUserController;
use App\Http\Controllers\supervisor\SuratKeluarController;
use App\Http\Controllers\supervisor\SuratMasukController;
use App\Http\Controllers\supervisor\TambahSuratController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Middleware untuk tamu (belum login)
Route::middleware('guest')->group(function () {
  Route::get('/registrasi', [AuthController::class, 'showRegistrasi'])->name('showRegistrasi');
  Route::post('/registrasi/submit', [AuthController::class, 'registrasi'])->name('registrasi');

  // AJAX Validasi Unik (NIP & Email)
  Route::get('/check-nip', [AuthController::class, 'checkNip'])->name('check.nip');
  Route::get('/check-email', [AuthController::class, 'checkEmail'])->name('check.email');

  Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
  Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('submitLogin');
});

// Middleware untuk pengguna yang sudah login
Route::middleware(['isAuth'])->group(function () {
  Route::get('/', [UserController::class, 'home'])->name('home');
  Route::get('/data-surat', [SuratMasukController::class, 'dataSurat'])->name('dataSurat');

  // SUPERVISOR DASHBOARD
  Route::get('/supervisor', [DashboardController::class, 'dashboardSupervisor'])->name('dashboardSupervisor');

  // Tambah Surat
  Route::get('/tambah-surat', [TambahSuratController::class, 'tambahSurat'])->name('tambahSurat');
  Route::post('/tambah-surat-submit', [TambahSuratController::class, 'submitSurat'])->name('submitSurat');

  // Surat Masuk
  Route::get('/surat-masuk-supervisor', [SuratMasukController::class, 'suratMasukSupervisor'])->name('suratMasukSupervisor');
  Route::post('/delete-surat/{id}', [SuratMasukController::class, 'deleteSurat'])->name('deleteSurat');
  Route::get('/downloadSurat/{filename}', [SuratMasukController::class, 'downloadSurat'])->name('downloadSurat');

  // Surat Keluar
  Route::get('/surat-keluar-supervisor', [SuratKeluarController::class, 'suratKeluarSupervisor'])->name('suratKeluarSupervisor');

  // Manajemen User
  Route::get('/management-user', [ManagementUserController::class, 'managementUser'])->name('managementUser');

  // Logout
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
