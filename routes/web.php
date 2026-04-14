<?php

use App\Http\Controllers\HurufController;
use App\Http\Controllers\KataController;
use App\Http\Controllers\KalimatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Root route
Route::get('/', [HurufController::class, 'index'])->name('huruf.index');

// Halaman utama daftar huruf
Route::get('/huruf', [HurufController::class, 'index'])->name('huruf.index');

// Form tambah & Proses simpan
Route::get('/huruf/tambah', [HurufController::class, 'create'])->name('huruf.create');
Route::post('/huruf/simpan', [HurufController::class, 'store'])->name('huruf.store');

// Detail huruf
Route::get('/huruf/{id}', [HurufController::class, 'show'])->name('huruf.show');

// Form edit & Proses update
Route::get('/huruf/{id}/edit', [HurufController::class, 'edit'])->name('huruf.edit');
Route::put('/huruf/{id}', [HurufController::class, 'update'])->name('huruf.update');

// Proses hapus
Route::delete('/huruf/{id}', [HurufController::class, 'destroy'])->name('huruf.destroy');

// Routes Kata
Route::prefix('huruf/{huruf_id}/kata')->group(function () {
    Route::get('/', [KataController::class, 'index'])->name('kata.index');
    Route::get('/tambah', [KataController::class, 'create'])->name('kata.create');
    Route::post('/simpan', [KataController::class, 'store'])->name('kata.store');
    Route::get('/{id}', [KataController::class, 'show'])->name('kata.show');
    Route::get('/{id}/edit', [KataController::class, 'edit'])->name('kata.edit');
    Route::put('/{id}', [KataController::class, 'update'])->name('kata.update');
    Route::delete('/{id}', [KataController::class, 'destroy'])->name('kata.destroy');
});

// Routes Kalimat
Route::prefix('huruf/{huruf_id}/kata/{kata_id}/kalimat')->group(function () {
    Route::get('/', [KalimatController::class, 'index'])->name('kalimat.index');
    Route::get('/tambah', [KalimatController::class, 'create'])->name('kalimat.create');
    Route::post('/simpan', [KalimatController::class, 'store'])->name('kalimat.store');
    Route::get('/{id}', [KalimatController::class, 'show'])->name('kalimat.show');
    Route::get('/{id}/edit', [KalimatController::class, 'edit'])->name('kalimat.edit');
    Route::put('/{id}', [KalimatController::class, 'update'])->name('kalimat.update');
    Route::delete('/{id}', [KalimatController::class, 'destroy'])->name('kalimat.destroy');
});