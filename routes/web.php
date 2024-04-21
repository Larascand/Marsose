<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\RWController;


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

Route::prefix('warga')->group(function () {
    Route::get('/', [WargaController::class, 'index'])->name('warga.index');
    Route::get('/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/store', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/edit/{NIK}', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/update/{NIK}', [WargaController::class, 'update'])->name('warga.update');
    Route::delete('/destroy/{NIK}', [WargaController::class, 'destroy'])->name('warga.destroy');
});
