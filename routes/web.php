<?php

use App\Http\Controllers\LaporanPengaduanController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\KKController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index']);
// Route::get('/', function() {
//     return view('layouts.template');
// });

Route::prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.index');
    Route::get('/laporan', [UserController::class, 'laporan'])->name('user.laporan');
    Route::get('/surat_keterangan', [UserController::class, 'surat_keterangan'])->name('user.surat_keterangan');
    Route::get('/surat_pengantar', [UserController::class, 'surat_pengantar'])->name('user.surat_pengantar');
});

Route::prefix('warga')->group(function () {
    Route::get('/', [WargaController::class, 'index'])->name('warga.index');
    Route::get('/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/store', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/edit/{id}', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/update/{id}', [WargaController::class, 'update'])->name('warga.update');
    Route::delete('/destroy/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');
});

Route::prefix('laporan')->group(function () {
    Route::get('/', [LaporanPengaduanController::class, 'index'])->name('laporan.index');
    Route::get('/create', [LaporanPengaduanController::class, 'create'])->name('laporan.create');
    Route::post('/store', [LaporanPengaduanController::class, 'store'])->name('laporan.store');
    Route::get('/edit/{id}', [LaporanPengaduanController::class, 'edit'])->name('laporan.edit');
    Route::put('/update/{id}', [LaporanPengaduanController::class, 'update'])->name('laporan.update');
    Route::delete('/destroy/{id}', [LaporanPengaduanController::class, 'destroy'])->name('laporan.destroy');
});

Route::prefix('rw')->group(function () {
    Route::get('/', [RTController::class, 'index'])->name('data_rw.index');
    Route::get('/create', [RTController::class, 'create'])->name('data_rw.create');
    Route::post('/store', [RTController::class, 'store'])->name('data_rw.store');
    Route::get('/edit/{No_RT}', [RTController::class, 'edit'])->name('data_rw.edit');
    Route::put('/update/{No_RT}', [RTController::class, 'update'])->name('data_rw.update');
    Route::delete('/destroy/{No_RT}', [RTController::class, 'destroy'])->name('data_rw.destroy');
});

Route::prefix('rt')->group(function () {
    Route::get('/', [RTController::class, 'index'])->name('data_rt.index');
    Route::get('/create', [RTController::class, 'create'])->name('data_rt.create');
    Route::post('/store', [RTController::class, 'store'])->name('data_rt.store');
    Route::get('/edit/{No_RT}', [RTController::class, 'edit'])->name('data_rt.edit');
    Route::put('/update/{No_RT}', [RTController::class, 'update'])->name('data_rt.update');
    Route::delete('/destroy/{No_RT}', [RTController::class, 'destroy'])->name('data_rt.destroy');
});

Route::prefix('kk')->group(function () {
    Route::get('/', [KKController::class, 'index'])->name('data_kk.index');
    Route::get('/create', [KKController::class, 'create'])->name('data_kk.create');
    Route::post('/store', [KKController::class, 'store'])->name('data_kk.store');
    Route::get('/edit/{No_RT}', [KKController::class, 'edit'])->name('data_kk.edit');
    Route::put('/update/{No_RT}', [KKController::class, 'update'])->name('data_kk.update');
    Route::delete('/destroy/{No_RT}', [KKController::class, 'destroy'])->name('data_kk.destroy');
});