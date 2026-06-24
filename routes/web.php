<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('login'));

Route::get('/login',   [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login',  [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/beranda', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/krs/export-pdf', [KrsController::class, 'exportPdf'])->name('krs.export.pdf');

    Route::get('/krs/export-pdf',   [KrsController::class, 'exportPdf'])->name('krs.export.pdf');
    Route::get('/krs/export-excel', [KrsController::class, 'exportExcel'])->name('krs.export.excel');

    Route::resource('dosen',      DosenController::class);
    Route::resource('mahasiswa',  MahasiswaController::class);
    Route::resource('matakuliah', MataKuliahController::class);
    Route::resource('jadwal',     JadwalController::class);
    Route::resource('krs',        KrsController::class);
});

Route::middleware(['auth', 'role:mahasiswa'])->prefix('mhs')->group(function () {
    Route::get('/beranda', [DashboardController::class, 'mahasiswaDashboard'])->name('mahasiswa.dashboard');
    Route::get('/krs/export-pdf', [KrsController::class, 'exportPdf'])->name('mahasiswa.krs.export.pdf');
    
    Route::resource('krs', KrsController::class)
        ->only(['index', 'show', 'create', 'store'])
        ->names([
            'index'  => 'mahasiswa.krs.index',
            'show'   => 'mahasiswa.krs.show',
            'create' => 'mahasiswa.krs.create',
            'store'  => 'mahasiswa.krs.store',
        ]);

    Route::resource('jadwal', JadwalController::class)
        ->only(['index', 'show'])
        ->names([
            'index' => 'mahasiswa.jadwal.index',
            'show'  => 'mahasiswa.jadwal.show',
        ]);
});