<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::view('/admin/siswa', 'dashboard.admin')->name('admin.siswa');
        Route::view('/admin/guru', 'dashboard.admin')->name('admin.guru');
        Route::view('/admin/kelas', 'dashboard.admin')->name('admin.kelas');
    });
    Route::middleware('role:guru')->group(function () {
        Route::view('/guru/nilai', 'dashboard.guru')->name('guru.nilai');
        Route::view('/guru/hafalan', 'dashboard.guru')->name('guru.hafalan');
    });
    Route::middleware('role:ortu,siswa')->group(function () {
        Route::view('/nilai', 'dashboard.ortu')->name('nilai.index');
    });
});
