<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TinController::class, 'index']);
Route::get('/tin/{id}', [TinController::class, 'chitiet']);
Route::get('/cat/{id}', [TinController::class, 'tintrongloai']);
