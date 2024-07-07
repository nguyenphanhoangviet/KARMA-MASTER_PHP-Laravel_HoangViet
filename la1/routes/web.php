<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinController;
use App\Http\Controllers\NguyenVanAController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TinController::class, 'index']);
Route::get('/', [TinController::class, 'lienhe']);
Route::get('/ct/{id}', [TinController::class, 'lay1tin']);
Route::get('/thongtinsv', [NguyenVanAController::class, 'show']);
