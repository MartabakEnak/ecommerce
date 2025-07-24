@extends('layouts.admin')

@section('title', 'Daftar Produk')

@section('content')
<div class="d-flex min-vh-100">
    {{-- Sidebar --}}
    <div class="bg-dark text-white p-4" style="width: 250px;">
        <h4 class="mb-4">Admin Panel</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="{{ route('admin.produk.index') }}"><i class="bi bi-box-seam me-2"></i> Daftar Produk</a>
            </li>
        </ul>
    </div>

    {{-- Main Content --}}
    <div class="flex-fill p-5">
        <h1 class="mb-4">Daftar Produk</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Form Tambah Produk --}}
        <div class="card mb-4">
            <div class="card-header">Tambah Produk</div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.produk.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

        {{-- Tabel Produk --}}
        <div class="card">
            <div class="card-header">List Produk</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered m-0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produks as $index => $produk)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                                <td>{{ $produk->stok }}</td>
                                <td>
                                    @if($produk->gambar)
                                        <img src="{{ asset('storage/' . $produk->gambar) }}" width="60" class="rounded">
                                    @else
                                        <small class="text-muted">Tidak ada</small>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Yakin hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($produks->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada produk</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
