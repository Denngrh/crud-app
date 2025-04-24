<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
Route::get('/', [DashboardController::class, 'index'])->name('home');


Route::resource('/pelanggan', PelangganController::class)->except('show');
Route::resource('/barang', BarangController::class)->except('show');
Route::resource('/penjualan', PenjualanController::class)->except('show');