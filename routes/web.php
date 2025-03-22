<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\CustomerTypeController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\SettingsController;

// No auth middleware as per your request
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Order Routes
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');

/// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// Payment Type Routes
Route::get('/payment-types', [PaymentTypeController::class, 'index'])->name('payment-types');
Route::get('/payment-types/create', [PaymentTypeController::class, 'create'])->name('payment-types.create');
Route::post('/payment-types', [PaymentTypeController::class, 'store'])->name('payment-types.store');
Route::get('/payment-types/{id}/edit', [PaymentTypeController::class, 'edit'])->name('payment-types.edit');
Route::put('/payment-types/{id}', [PaymentTypeController::class, 'update'])->name('payment-types.update');
Route::delete('/payment-types/{id}', [PaymentTypeController::class, 'destroy'])->name('payment-types.destroy');

// Customer Type Routes
Route::get('/customer-types', [CustomerTypeController::class, 'index'])->name('customer-types');
Route::get('/customer-types/create', [CustomerTypeController::class, 'create'])->name('customer-types.create');
Route::post('/customer-types', [CustomerTypeController::class, 'store'])->name('customer-types.store');
Route::get('/customer-types/{id}/edit', [CustomerTypeController::class, 'edit'])->name('customer-types.edit');
Route::put('/customer-types/{id}', [CustomerTypeController::class, 'update'])->name('customer-types.update');
Route::delete('/customer-types/{id}', [CustomerTypeController::class, 'destroy'])->name('customer-types.destroy');

// Leaderboard Routes
Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');

// Messages Routes
Route::get('/messages', [MessagesController::class, 'index'])->name('messages');

// Settings Routes
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

// Set Language Route
Route::get('/set-language/{lang}', function ($lang) {
    session(['locale' => $lang]);
    return redirect()->back();
})->name('set-language');
