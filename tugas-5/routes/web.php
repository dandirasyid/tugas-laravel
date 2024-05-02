<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/admin/list-products', [AdminController::class, 'index'])->name('admin.index');
Route::get('/tambah-product', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/list-products/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/product/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/product/{id}/update', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/product/{id}/destroy', [AdminController::class, 'delete'])->name('admin.destroy');
