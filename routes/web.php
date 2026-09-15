<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\SetoranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'pengelola'])->name('dashboard.pengelola');

Route::get('/nasabah', [NasabahController::class, 'index'])->name('nasabah.index');

Route::get('/transaksi', [SetoranController::class, 'index'])->name('transaksi.index');

Route::get('/jenis-sampah', [JenisSampahController::class, 'index'])->name('jenis-sampah.index');