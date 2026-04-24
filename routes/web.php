<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KrsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return redirect('/beranda');
// });
Route::get('/beranda', function () {
    return view('pages.beranda');
});

Route::resource('dosen', DosenController::class);

Route::resource('mahasiswa', MahasiswaController::class);

Route::resource('matakuliah', MataKuliahController::class);

Route::resource('jadwal', JadwalController::class);

Route::resource('krs', KrsController::class);