<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
        }
        .nav-link:hover {
            background-color: #495057;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    {{-- Navbar Top (warna hitam) --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Admin</span>
            <div class="d-flex ms-auto">
                <a href="#" class="btn btn-outline-light me-2">
                    <i class="bi bi-person-circle"></i> Profil
                </a>
                <a href="{{ route('logout') }}" class="btn btn-outline-light">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="d-flex min-vh-100">
        {{-- Sidebar --}}
        <div class="bg-dark text-white p-4" style="width: 250px;">
            <h4 class="mb-4">Admin Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('admin.produk.index') }}">
                        <i class="bi bi-box-seam me-2"></i> Daftar Produk
                    </a>
                </li>
            </ul>
        </div>

        {{-- Main Content --}}
        <div class="flex-fill p-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
