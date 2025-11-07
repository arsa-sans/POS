<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategorieController;

// route order
Route::get('/', [HomeController::class, 'index']);
Route::get('/test', [HomeController::class, 'testing']);
Route::get('/beranda', [OrderController::class, 'index']);
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{order}/print', [OrderController::class, 'print'])->name('order.print');

// route category
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create']);
Route::post('/category', [CategorieController::class, 'store']);
Route::get('/category/{id}/edit', [CategorieController::class, 'edit'])->name('category.edit');
Route::post('/categories/{id}/update', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/category/{id}', [CategorieController::class, 'destroy'])->name('category.destroy');