<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'home'])->name('dashboard');

    Route::get('/products', [AdminController::class, 'index_product'])->name('index_product');
    Route::get('/products/create', [AdminController::class, 'create_product'])->name('create_product');
    Route::post('/products', [AdminController::class, 'store_product'])->name('store_product');
    Route::get('/products/{id}/edit', [AdminController::class, 'edit_product'])->name('edit_product');
    Route::put('/products/{id}', [AdminController::class, 'update_product'])->name('update_product');
    Route::delete('/products/{products}', [AdminController::class, 'delete_product'])->name('delete_product');

    Route::get('/categories', [AdminController::class, 'index_category'])->name('index_category');
    Route::get('/categories/create', [AdminController::class, 'create_category'])->name('create_category');
    Route::post('/categories', [AdminController::class, 'store_category'])->name('store_category');
    Route::get('/categories/{id}/edit', [AdminController::class, 'edit_category'])->name('edit_category');
    Route::put('/categories/{id}', [AdminController::class, 'update_category'])->name('update_category');
    Route::delete('/categories/{categories}', [AdminController::class, 'delete_category'])->name('delete_category');
});

require __DIR__.'/auth.php';
