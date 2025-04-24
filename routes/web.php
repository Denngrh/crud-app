<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;

Route::get('/', [DashboardController::class, 'index'])->name('home');


Route::resource('/pelanggan', PelangganController::class)->except('show');
Route::resource('/barang', BarangController::class)->except('show');
