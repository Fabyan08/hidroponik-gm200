<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdmminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard/index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// web onboarding
Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

Route::get('/produk', function () {
    return view('produk');
})->name('produk');

Route::get('/artikel', function () {
    return view('artikel');
})->name('artikel');

Route::get('/pelatihan', function () {
    return view('pelatihan');
})->name('pelatihan');

// middleware dashboard owner
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/owner', function () {
        return view('dashboard/index');
    })->name('dashboard');
    // Profile
    Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('/manajemen-admin', [AdminController::class, 'index'])->name('manajemen-admin.index');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');

    // Manajemen produk
    Route::get('/manajemen-produk', [ProdukController::class, 'index'])->name('manajemen-produk.index');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('product.store');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('product.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('product.destroy');

    // Manajemen Artikel
    Route::get('/manajemen-artikel', [ArtikelController::class, 'index'])->name('manajemen-artikel.index');
    Route::get('/manajemen-artikel/tambah', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::get('/manajemen-artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
    Route::post('/artikel/store', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::put('/artikel/update/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::get('/manajemen-artikel/edit/{id}', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::delete('/artikel/delete/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');

    // Manajemen Pelatihan
    Route::get('/manajemen-pelatihan', [TrainingController::class, 'index'])->name('manajemen-pelatihan.index');
    Route::post('/pelatihan/store', [TrainingController::class, 'store'])->name('pelatihan.store');
    Route::put('/pelatihan/update/{id}', [TrainingController::class, 'update'])->name('pelatihan.update');
    Route::delete('/pelatihan/delete/{id}', [TrainingController::class, 'destroy'])->name('pelatihan.destroy');
    Route::get('/manajemen-pelatihan/{id}', [TrainingController::class, 'show'])->name('pelatihan.show');
});

require __DIR__ . '/auth.php';
