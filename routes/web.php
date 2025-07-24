<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

   
    Route::get('/produk', [ProductController::class, 'index'])->name('produk.index'); // Halaman daftar + form
    Route::post('/produk/store', [ProductController::class, 'store'])->name('produk.store'); // Tambah
    Route::get('/produk/edit/{id}', [ProductController::class, 'edit'])->name('produk.edit'); // Ambil data untuk form edit
    Route::put('/produk/update/{id}', [ProductController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('produk.destroy'); // Hapus
});


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
