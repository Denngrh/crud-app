{{-- filepath: /home/denngrh/Documents/crud-app/resources/views/penjualan/create.blade.php --}}
@extends('temp.app')

@section('content')
<title>Tambah Penjualan</title>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-lg-3 col-md-4 bg-white sidebar p-0 shadow-sm" style="min-height: 100vh;">
            <div class="sidebar-sticky py-4">
                <p class="text-center h4 mb-4 text-primary">DASHBOARD</p>
                <hr>
                <div class="nav flex-column nav-pills">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="bi bi-house-door-fill"></i> DASHBOARD
                    </a>
                    <a href="{{ route('barang.index') }}" class="nav-link">
                        <i class="bi bi-box-seam"></i> BARANG
                    </a>
                    <a href="{{ route('pelanggan.index') }}" class="nav-link">
                        <i class="bi bi-people-fill"></i> PELANGGAN
                    </a>
                    <a href="{{ route('penjualan.index') }}" class="nav-link">
                        <i class="bi bi-cart-fill"></i> PENJUALAN
                    </a>
                </div>
                <hr>
            </div>
        </nav>

        <!-- Content -->
        <div class="col-lg-9 col-md-8 p-4">
            <h3 class="mb-4 text-primary"> <i class="bi bi-cart-plus-fill"></i> Tambah Penjualan</h3>
            <hr>
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('penjualan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nopelanggan" class="form-label">Pelanggan</label>
                            <select name="nopelanggan" id="nopelanggan" class="form-control" required>
                                <option value="">Pilih Pelanggan</option>
                                @foreach ($pelanggan as $item)
                                    <option value="{{ $item->nopelanggan }}">{{ $item->namapelanggan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kodebarang" class="form-label">Barang</label>
                            <select name="kodebarang" id="kodebarang" class="form-control" required>
                                <option value="">Pilih Barang</option>
                                @foreach ($barang as $item)
                                    <option value="{{ $item->kodebarang }}">{{ $item->namabarang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalpenjualan" class="form-label">Tanggal Penjualan</label>
                            <input type="date" name="tanggalpenjualan" id="tanggalpenjualan" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection