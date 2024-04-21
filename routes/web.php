<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\KKController;




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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('rw')->group(function () {
    Route::get('/', [RwController::class, 'index'])->name('data_rw.index');
    Route::get('/create', [RwController::class, 'create'])->name('data_rw.create');
    Route::post('/store', [RwController::class, 'store'])->name('data_rw.store');
    Route::get('/edit/{No_RW}', [RwController::class, 'edit'])->name('data_rw.edit');
    Route::put('/update/{No_RW}', [RwController::class, 'update'])->name('data_rw.update');
    Route::delete('/destroy/{No_RW}', [RwController::class, 'destroy'])->name('data_rw.destroy');
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
    Route::get('/edit/{No_KK}', [KKController::class, 'edit'])->name('data_kk.edit');
    Route::put('/update/{No_KK}', [KKController::class, 'update'])->name('data_kk.update');
    Route::delete('/destroy/{No_KK}', [KKController::class, 'destroy'])->name('data_kk.destroy');
});


Route::prefix('warga')->group(function () {
    Route::get('/', [WargaController::class, 'index'])->name('warga.index');
    Route::get('/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/store', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/edit/{NIK}', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/update/{NIK}', [WargaController::class, 'update'])->name('warga.update');
    Route::delete('/destroy/{NIK}', [WargaController::class, 'destroy'])->name('warga.destroy');
});
