@extends('layouts.admin')

@section('title', 'Dashboard Admin')

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
        <h1 class="mb-4">Selamat Datang di Halaman Admin</h1>
        <p class="lead">Gunakan menu di sebelah kiri untuk mengelola produk.</p>
    </div>
</div>
@endsection
