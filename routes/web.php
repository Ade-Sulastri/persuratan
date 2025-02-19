<?php

use App\Http\Controllers\auth\AuthController;

// Super Admin
use App\Http\Controllers\super_admin\SuperAdminController;

// supervisor
use App\Http\Controllers\supervisor\DashboardController;
use App\Http\Controllers\supervisor\ManagementUserController;
use App\Http\Controllers\supervisor\SuratKeluarController;
use App\Http\Controllers\supervisor\SuratMasukController;
use App\Http\Controllers\supervisor\TambahSuratController;

// operator
use App\Http\Controllers\operator\DashboardOperatorController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
  Route::get('/registrasi', [AuthController::class, 'showRegistrasi'])->name('showRegistrasi');
  Route::post('/registrasi/submit', [AuthController::class, 'registrasi'])->name('registrasi');

  Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
  Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('submitLogin');
});

Route::middleware(['isAuth'])->group(function () {
  // OPERATOR
  Route::get('/dashboard-operator', [DashboardOperatorController::class, 'dashboardOperator'])->name('dashboardOperator');
});


// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['admin'])->group(function () {
  // SUPERVISOR
  Route::get('/supervisor', [DashboardController::class, 'dashboardSupervisor'])->name('dashboardSupervisor');

  // tambah surat
  Route::get('/tambah-surat', [TambahSuratController::class, 'tambahSurat'])->name('tambahSurat');
  Route::post('/tambah-surat-submit', [TambahSuratController::class, 'submitSurat'])->name('submitSurat');

  // surat masuk
  Route::get('/surat-masuk-supervisor', [SuratMasukController::class, 'suratMasukSupervisor'])->name('suratMasukSupervisor');
  Route::post('/delete-surat/{id}', [SuratMasukController::class, 'deleteSurat'])->name('deleteSurat');
  Route::get('/downloadSurat/{filename}', [SuratMasukController::class, 'downloadSurat'])->name('downloadSurat');

  // surat keluar
  Route::get('/surat-keluar-supervisor', [SuratKeluarController::class, 'suratKeluarSupervisor'])->name('suratKeluarSupervisor');

  // management user
  Route::get('/management-user', [ManagementUserController::class, 'managementUser'])->name('managementUser');
});


// Route::middleware(['superAdmin'])->group(function() {
Route::get('/super-admin', [SuperAdminController::class, 'dashboardSuperAdmin'])->name('dashboardSuperAdmin');
// });