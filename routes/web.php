<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/', [BukuController::class, 'home']);
Route::get('/buku', [BukuController::class, 'index']);
Route::get('buku/edit/{kode_buku}', [BukuController::class, 'edit'])->name('buku.edit');
Route::post('/buku', [BukuController::class, 'store']);
Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/form', [BukuController::class, 'form']);
Route::get('/form/create', [BukuController::class, 'tampilForm']);