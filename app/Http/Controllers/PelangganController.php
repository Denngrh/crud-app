<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namapelanggan' => 'required|max:25',
            'alamat' => 'required|max:25',
        ]);

        Pelanggan::create($request->all());
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $nopelanggan)
{
    $request->validate([
        'namapelanggan' => 'required|max:25',
        'alamat' => 'required|max:25',
    ]);

    $pelanggan = Pelanggan::where('nopelanggan', $nopelanggan)->firstOrFail();
    $pelanggan->update($request->all());
    return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
}

    public function destroy($nopelanggan)
{
    $pelanggan = Pelanggan::where('nopelanggan', $nopelanggan)->firstOrFail();
    $pelanggan->delete();
    return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
}
}