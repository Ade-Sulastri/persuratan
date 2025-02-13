<?php

use App\Http\Controllers\auth\AuthController;

// supervisor
use App\Http\Controllers\supervisor\DashboardController;
use App\Http\Controllers\supervisor\ManagementUserController;
use App\Http\Controllers\supervisor\SuratKeluarController;
use App\Http\Controllers\supervisor\SuratMasukController;


// use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\supervisor\TambahSuratController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
  Route::get('/registrasi', [AuthController::class, 'showRegistrasi'])->name('showRegistrasi');
  Route::post('/registrasi/submit', [AuthController::class, 'registrasi'])->name('registrasi');

  Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
  Route::post('/login/submit', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
  Route::get('/data-surat', [SuratMasukController::class, 'dataSurat'])->name('dataSurat');

  Route::get('/', [UserController::class, 'home'])->name('home');
  // SUPERVISOR
  Route::get('/supervisor', [DashboardController::class, 'dashbordSupervisor'])->name('dashbordSupervisor');

  // tambah surat
  Route::get('/tambah-surat', [TambahSuratController::class, 'tambahSurat'])->name('tambahSurat');
  Route::post('/tambah-surat-submit', [TambahSuratController::class, 'submitSurat'])->name('submitSurat');

  // surat masuk
  Route::get('/surat-masuk-supervisor', [SuratMasukController::class, 'suratMasukSupervisor'])->name('suratMasukSupervisor');

  // surat keluar
  Route::get('/surat-keluar-supervisor', [SuratKeluarController::class, 'suratKeluarSupervisor'])->name('suratKeluarSupervisor');

  // management user
  Route::get('/management-user', [ManagementUserController::class, 'managementUser'])->name('managementUser');
});
