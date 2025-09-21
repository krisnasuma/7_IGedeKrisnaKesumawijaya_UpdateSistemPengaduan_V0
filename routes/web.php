<?php

use App\Http\Controllers\Auth\MasyarakatAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Masyarakat\PengajuanController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Routes Umum
Route::get('/', function () {
    return view('welcome');
});

// Masyarakat Authentication Routes
Route::prefix('masyarakat')->group(function () {
    Route::get('/login', [MasyarakatAuthController::class, 'showLoginForm'])->name('masyarakat.login');
    Route::post('/login', [MasyarakatAuthController::class, 'login']);
    Route::get('/register', [MasyarakatAuthController::class, 'showRegisterForm'])->name('masyarakat.register');
    Route::post('/register', [MasyarakatAuthController::class, 'register']);
    Route::post('/logout', [MasyarakatAuthController::class, 'logout'])->name('masyarakat.logout');
});

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Protected Masyarakat Routes
Route::middleware(['auth:masyarakat'])->prefix('masyarakat')->group(function () {
    Route::get('/dashboard', function () {
        return view('masyarakat.dashboard');
    })->name('masyarakat.dashboard');
    
    Route::resource('/pengajuan', PengajuanController::class);
});

// Protected Admin Routes
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/pengajuan', [AdminController::class, 'pengajuan'])->name('admin.pengajuan');
    Route::put('/pengajuan/{id}', [AdminController::class, 'updatePengajuan'])->name('admin.pengajuan.update');
    Route::get('/masyarakat', [AdminController::class, 'dataMasyarakat'])->name('admin.masyarakat');
    Route::put('/masyarakat/{id}/verifikasi', [AdminController::class, 'verifikasiMasyarakat'])->name('admin.masyarakat.verifikasi');
});