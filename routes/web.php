<?php
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MataPelajaranController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Guru\NilaiController as GuruNilaiController;
use App\Http\Controllers\Ortu\NilaiController as OrtuNilaiController;
use App\Http\Controllers\Siswa\NilaiController as SiswaNilaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware(['auth', 'no-cache'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('siswa', SiswaController::class);
        Route::resource('guru', GuruController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('mapel', MataPelajaranController::class)->parameters(['mapel' => 'mapel']);
        Route::resource('user', UserController::class);
    });

    Route::middleware('role:guru')->prefix('guru')->name('guru.')->group(function () {
        Route::resource('nilai', GuruNilaiController::class);
        Route::view('/hafalan', 'dashboard.guru')->name('hafalan');
    });
    Route::middleware('role:ortu')->prefix('ortu')->name('ortu.')->group(function () {
        Route::get('/nilai', [OrtuNilaiController::class, 'index'])->name('nilai.index');
    });
    Route::middleware('role:siswa')->prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/nilai', [SiswaNilaiController::class, 'index'])->name('nilai.index');
    });
});
