@extends('temp.app')

@section('content')
<title>Barang</title>
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
                    <a href="{{ route('barang.index') }}" class="nav-link active">
                        <i class="bi bi-box-seam"></i> BARANG
                    </a>
                    <a href="{{ route('pelanggan.index') }}" class="nav-link ">
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
            <h3 class="mb-4 text-primary"> <i class="bi bi-box-seam"></i> Barang</h3>
            <hr>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Barang</button>
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
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $item)
                            <tr>
                                <td>{{ $item->kodebarang }}</td>
                                <td>{{ $item->namabarang }}</td>
                                <td>{{ $item->hargabarang }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->kodebarang }}">Edit</button>
                                    <form action="{{ route('barang.destroy', $item->kodebarang) }}" method="POST" style="display:inline;" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
<div class="modal fade" id="editModal{{ $item->kodebarang }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->kodebarang }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('barang.update', $item->kodebarang) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $item->kodebarang }}">Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="namabarang{{ $item->kodebarang }}" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namabarang{{ $item->kodebarang }}" name="namabarang" value="{{ $item->namabarang }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="hargabarang{{ $item->kodebarang }}" class="form-label">Harga Barang</label>
                        <input type="number" class="form-control" id="hargabarang{{ $item->kodebarang }}" name="hargabarang" value="{{ $item->hargabarang }}" required>
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
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="namabarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namabarang" name="namabarang" required>
                    </div>
                    <div class="mb-3">
                        <label for="hargabarang" class="form-label">Harga Barang</label>
                        <input type="number" class="form-control" id="hargabarang" name="hargabarang" required>
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