<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\AdminSPController;

Route::get('/sp', [SanPhamController::class, 'index']);
Route::get('/sp/{id}', [SanPhamController::class, 'chitiet']);
Route::get('/sp_loai/{id}', [SanPhamController::class, 'sp_trong_loai']);
Route::resource('admin/sp', AdminSPController::class);