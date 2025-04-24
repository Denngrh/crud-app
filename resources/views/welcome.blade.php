@extends('temp.app')
@section('content')
<title>Dashboard</title>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-lg-3 col-md-4 bg-white sidebar p-0 shadow-sm" style="min-height: 100vh;">
            <div class="sidebar-sticky py-4">
                <p class="text-center h4 mb-4 text-primary">DASHBOARD</p>
                <hr>
                <div class="nav flex-column nav-pills">
                    <a href="{{ route('home') }}" class="nav-link active">
                        <i class="bi bi-house-door-fill"></i> DASHBOARD
                    </a>
                    <a href="{{ route('barang.index') }}" class="nav-link">
                        <i class="bi bi-box-seam"></i> BARANG
                    </a>
                    <a href="{{ route('pelanggan.index') }}" class="nav-link">
                        <i class="bi bi-people-fill"></i> PELANGGAN
                    </a>
                    <a href="{{ route('penjualan.index') }}" class="nav-link">
                        <i class="bi bi-person-badge-fill"></i> PENJUALAN
                    </a>
                </div>
                <hr>
            </div>
        </nav>

        <!-- Content -->
        <div class="col-lg-9 col-md-8 p-4" id="content">
            <h3 class="mb-4 text-primary"><i class="bi bi-speedometer2"></i> Dashboard</h3>
            <hr>
            <!-- Content here -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-3 shadow-sm border-0" style="background-color: #f8f9fa;">
                        <div class="card-body text-center">
                            <h5 class="card-title text-primary">  <i class="bi bi-people-fill"></i> Total Pelanggan</h5>
                            <p class="card-text h4">{{ $totalPelanggan }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-3 shadow-sm border-0" style="background-color: #f8f9fa;">
                        <div class="card-body text-center">
                            <h5 class="card-title text-success"><i class="bi bi-person-badge-fill"></i> Total Penjualan</h5>
                            <p class="card-text h4">{{ $totalPenjualan }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-3 shadow-sm border-0" style="background-color: #f8f9fa;">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning"><i class="bi bi-box-seam"></i> Total Barang</h5>
                            <p class="card-text h4">{{ $totalBarang }}</p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection