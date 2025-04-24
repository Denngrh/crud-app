<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pelanggan; 
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    Public function index()
    {
        $totalBarang = Barang::count();
        $totalPelanggan = Pelanggan::count(); // Hitung total pelanggan
        return view('welcome', compact('totalBarang', 'totalPelanggan'));
    }
}
