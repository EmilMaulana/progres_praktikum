<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/product', [ProductController::class, 'index'])->name('product.list');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product-store');
Route::get('/product/{product:id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product:id}/edit', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product:id}/delete', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/excel/export', [ProductController::class, 'exportExcel'])->name('product.export');
Route::get('/product/pdf/export', [ProductController::class, 'exportPdf'])->name('product.export.pdf');


Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.list');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/{supplier:id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::put('/supplier/{supplier:id}/edit', [SupplierController::class, 'update'])->name('supplier.update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
