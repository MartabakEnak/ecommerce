@extends('layouts.admin')

@section('title', 'Daftar Produk')

@section('content')
<div class="container mt-5">
    <h2>{{ isset($editProduct) ? 'Edit Produk' : 'Tambah Produk' }}</h2>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ isset($editProduct) ? route('admin.produk.update', $editProduct->id) : route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @if (isset($editProduct))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama produk" value="{{ isset($editProduct) ? $editProduct->name : old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" name="price" class="form-control" placeholder="Masukkan harga produk" value="{{ isset($editProduct) ? $editProduct->price : old('price') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" placeholder="Deskripsi produk" required>{{ isset($editProduct) ? $editProduct->description : old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar (opsional)</label>
            <input type="file" name="image" class="form-control">
            @if (isset($editProduct) && $editProduct->image)
                <img src="{{ asset('storage/' . $editProduct->image) }}" width="100" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn {{ isset($editProduct) ? 'btn-warning' : 'btn-success' }}">
            {{ isset($editProduct) ? 'Update Produk' : 'Tambah Produk' }}
        </button>
        @if (isset($editProduct))
            <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary ms-2">Batal Edit</a>
        @endif
    </form>

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
            <tr>
                <td>
                    @if ($p->image)
                        <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}" width="80">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>{{ $p->name }}</td>
                <td>Rp{{ number_format($p->price, 0, ',', '.') }}</td>
                <td>{{ $p->description }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.produk.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
