<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\AdminController; // Tambahkan controller ini
use App\Http\Controllers\ProductController; // Jika masih digunakan

// Group route admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard'); // ← FIXED here

    // Resource CRUD produk
    Route::resource('/produk', ProdukController::class, [
        'names' => [
            'index' => 'produk.index',
            'create' => 'produk.create',
            'store' => 'produk.store',
            'show' => 'produk.show',
            'edit' => 'produk.edit',
            'update' => 'produk.update',
            'destroy' => 'produk.destroy',
        ]
    ]);
});

// Optional: Jika kamu masih butuh ini untuk produk publik
Route::resource('products', ProductController::class);
