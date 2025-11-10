<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReportController;

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

// route product
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

// route product
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create']);
Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/customers/{id}/update', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

// route report
Route::get('/report/daily', [ReportController::class, 'daily'])->name('report.daily');