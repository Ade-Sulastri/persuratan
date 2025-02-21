<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\UserController;

// Super Admin
use App\Http\Controllers\super_admin\SuperAdminController;

// supervisor
use App\Http\Controllers\supervisor\SuratSupervisorController;
use App\Http\Controllers\supervisor\DashboardController;
use App\Http\Controllers\supervisor\ManagementUserController;

// operator
use App\Http\Controllers\operator\DashboardOperatorController;
use App\Http\Controllers\operator\SuratOperatorController;
use App\Http\Controllers\operator\TambahSuratController;


Route::middleware('guest')->group(function () {
Route::get('/registrasi', [AuthController::class, 'showRegistrasi'])->name('showRegistrasi');
Route::post('/registrasi/submit', [AuthController::class, 'registrasi'])->name('registrasi');

Route::get('/', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('submitLogin');
});


// OPERATOR/USERS
Route::middleware(['isAuth'])->group(function () {
  // OPERATOR
  Route::get('/dashboard-operator', [DashboardOperatorController::class, 'dashboardOperator'])->name('dashboardOperator');

  // tambah surat
  Route::get('/tambah-surat', [TambahSuratController::class, 'tambahSurat'])->name('tambahSurat');
  Route::post('/tambah-surat-submit', [TambahSuratController::class, 'submitSurat'])->name('submitSurat');

  // surat masuk operator
  Route::get('/surat-masuk-operator', [SuratOperatorController::class, 'suratMasukOperator'])->name('suratMasukOperator');

  // surat keluar operator
  Route::get('/surat-keluar-operator', [SuratOperatorController::class, 'suratKeluarOperator'])->name('suratKeluarOperator');

  // download surat operator
  Route::get('/download-surat/{filename}', [SuratOperatorController::class, 'downloadSuratOperator'])->name('downloadSuratOperator');

  // delete surat operator
  Route::post('/delete-surat-operator/{id}', [SuratOperatorController::class, 'deleteSuratOperator'])->name('deleteSuratOperator');
});


// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// SUPRVISOR/ADMIN
Route::middleware(['admin'])->group(function () {
  // SUPERVISOR
  Route::get('/supervisor', [DashboardController::class, 'dashboardSupervisor'])->name('dashboardSupervisor');

  // surat masuk
  Route::get('/surat-masuk-supervisor', [SuratSupervisorController::class, 'suratMasukSupervisor'])->name('suratMasukSupervisor');
  // delete surat
  Route::post('/delete-surat/{id}', [SuratSupervisorController::class, 'deleteSurat'])->name('deleteSurat');
  // download surat
  Route::get('/downloadSurat/{filename}', [SuratSupervisorController::class, 'downloadSurat'])->name('downloadSurat');
  // update surat
  Route::put('/update-surat/{id}', [SuratSupervisorController::class, 'updateSurat'])->name('updateSurat');
  // surat keluar
  Route::get('/surat-keluar-supervisor', [SuratSupervisorController::class, 'suratKeluarSupervisor'])->name('suratKeluarSupervisor');

  // management user
  Route::get('/management-user', [ManagementUserController::class, 'managementUser'])->name('managementUser');

  // delete user
  Route::post('/delete-user/{nip}', [ManagementUserController::class, 'deleteUser'])->name('deleteUser');
  // edit user 
  Route::put('/update-user/{nip}', [ManagementUserController::class, 'updateUser'])->name('updateUser');
});


Route::middleware(['superAdmin'])->group(function() {
Route::get('/super-admin', [SuperAdminController::class, 'dashboardSuperAdmin'])->name('dashboardSuperAdmin');
});