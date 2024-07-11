<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RandomProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\CommentController;

Route::get('/key-check', function () {
    $key = config('app.key');
    $cipher = config('app.cipher');
    return response()->json(['key' => $key, 'cipher' => $cipher]);
});

Route::prefix('admin')->middleware(['auth', Admin::class])->name('admin.')->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::resource('brands', BrandController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('user', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order-details', OrderDetailController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('comments', CommentController::class);
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

// Route gốc (/) hiển thị trang đăng nhập và xử lý đăng nhập
Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login-store');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/contact', function () {
    return view('user.karma-master.contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/user/dashboard', [RandomProductController::class, 'index'])->name('user.dashboard');
Route::get('/single-product/{id}', [RandomProductController::class, 'showSingleProduct'])->name('single-product');
Route::post('/single-product-review/{id}', [RandomProductController::class, 'storeSingleProduct'])->name('store-review');
Route::get('/category', [RandomProductController::class, 'category'])->name('category');
Route::get('/category/{id}', [RandomProductController::class, 'showCategory'])->name('category.show');
Route::get('/search', [RandomProductController::class, 'search'])->name('products.search');

