{{-- filepath: /home/denngrh/Documents/crud-app/resources/views/penjualan/index.blade.php --}}
@extends('temp.app')

@section('content')
<title>Penjualan</title>
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
                    <a href="{{ route('penjualan.index') }}" class="nav-link active">
                        <i class="bi bi-cart-fill"></i> PENJUALAN
                    </a>
                </div>
                <hr>
            </div>
        </nav>

        <!-- Content -->
        <div class="col-lg-9 col-md-8 p-4">
            <h3 class="mb-4 text-primary"> <i class="bi bi-cart-fill"></i> Penjualan</h3>
            <hr>
            <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Penjualan</a>
            @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Faktur</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Barang</th> <!-- Tambahkan kolom Barang -->
                        <th>Tanggal Penjualan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualan as $item)
                    <tr>
                        <td>{{ $item->faktur }}</td>
                        <td>{{ $item->barang->namabarang ?? 'Barang telah dihapus' }}</td>
                        <td>{{ $item->pelanggan->namapelanggan ?? 'Pelanggan telah dihapus' }}</td>
                        <td>{{ $item->tanggalpenjualan }}</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $item->faktur }}">Hapus</button>
                            <form id="delete-form-{{ $item->faktur }}" action="{{ route('penjualan.destroy', $item->faktur) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const faktur = this.getAttribute('data-id');
                const form = document.getElementById(`delete-form-${faktur}`);

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection