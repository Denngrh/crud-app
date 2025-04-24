{{-- filepath: /home/denngrh/Documents/crud-app/resources/views/pelanggan/index.blade.php --}}
@extends('temp.app')

@section('content')
<title>Pelanggan</title>
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
                    <a href="{{ route('pelanggan.index') }}" class="nav-link active">
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
        <div class="col-lg-9 col-md-8 p-4">
            <h3 class="mb-4 text-primary"> <i class="bi bi-people-fill"></i> Pelanggan</h3>
            <hr>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Pelanggan</button>
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table id="table" class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Nope Pelanggan</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggan as $item)
                            <tr>
                                <td>{{ $item->nopelanggan }}</td>
                                <td>{{ $item->namapelanggan }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->nopelanggan }}">Edit</button>
                                    <form action="{{ route('pelanggan.destroy', ['pelanggan' => $item->nopelanggan]) }}" method="POST" style="display:inline;" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <div class="modal fade" id="editModal{{ $item->nopelanggan }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->nopelanggan }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('pelanggan.update', $item->nopelanggan) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $item->nopelanggan }}">Edit Pelanggan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="namapelanggan{{ $item->nopelanggan }}" class="form-label">Nama Pelanggan</label>
                                                    <input type="text" class="form-control" id="namapelanggan{{ $item->nopelanggan }}" name="namapelanggan" value="{{ $item->namapelanggan }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat{{ $item->nopelanggan }}" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat{{ $item->nopelanggan }}" name="alamat" value="{{ $item->alamat }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="namapelanggan" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="namapelanggan" name="namapelanggan" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); 

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
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