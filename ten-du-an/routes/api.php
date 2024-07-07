<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('sp',[SanPhamController::class, 'index']);
Route::get('sp/{id}',[SanPhamController::class, 'chi_tiet']);
Route::get('loai/{id}',[SanPhamController::class, 'sp_trong_loai']);