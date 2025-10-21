<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di bawah ini adalah rute web utama aplikasi Anda.
| Breeze menggunakan sistem middleware 'auth' untuk melindungi halaman
| yang hanya boleh diakses oleh pengguna yang sudah login.
|
*/

// 🔹 Halaman utama
Route::get('/', function () {
    // Jika sudah login -> ke dashboard, jika belum -> ke login
    return Auth::check() ? redirect('/dashboard') : redirect('/login');
});

// 🔹 Halaman dashboard (setelah login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// 🔹 Rute untuk kelola data warga
Route::middleware(['auth'])->group(function () {
    Route::resource('warga', WargaController::class);
});

// 🔹 Halaman profil (bawaan Laravel Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔹 Include file autentikasi dari Breeze
require __DIR__ . '/auth.php';
