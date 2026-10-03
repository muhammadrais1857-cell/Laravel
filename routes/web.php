<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/mahasiswa/{mahasiswa}/qr', [MahasiswaController::class, 'qr'])
    ->name('mahasiswa.qr');

Route::get('/scanner', [ScannerController::class, 'index'])
    ->name('scanner');

Route::post('/scanner/scan', [ScannerController::class, 'scan'])
    ->name('scanner.scan');

 Route::get('/presensi', [PresensiController::class, 'index'])
    ->name('presensi.index');

 Route::post('/scanner/presensi', [PresensiController::class, 'store'])
    ->name('scanner.presensi');