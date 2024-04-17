<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;

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

Route::prefix('warga')->group(function () {
    Route::get('/', [WargaController::class, 'index'])->name('warga.index');
    Route::get('/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/store', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/edit/{id}', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/update/{id}', [WargaController::class, 'update'])->name('warga.update');
    Route::delete('/destroy/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');
});
