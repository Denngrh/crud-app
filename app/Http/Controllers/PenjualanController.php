<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Barang; 

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with('pelanggan')->get();
        return view('penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $barang = Barang::all(); // Ambil data barang
        return view('penjualan.create', compact('pelanggan', 'barang'));
    }


public function store(Request $request)
{
    $request->validate([
        'nopelanggan' => 'required|exists:pelanggan,nopelanggan',
        'kodebarang' => 'required|exists:barang,kodebarang',
        'tanggalpenjualan' => 'required|date',
    ]);

    Penjualan::create($request->all());
    return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan.');
}

    public function destroy($faktur)
    {
        $penjualan = Penjualan::findOrFail($faktur);
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus.');
    }
}