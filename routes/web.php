<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/test', [HomeController::class, 'testing']);
Route::get('/beranda', [OrderController::class, 'index']);
Route::get('/order', [OrderController::class, 'store']);