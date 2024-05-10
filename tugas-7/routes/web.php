<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/admin/{user_id}/list-products', [AdminController::class, 'index'])->name('admin.index');
Route::get('/{id}/tambah-product', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/{id}/list-products/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/{user_id}/product/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/{user_id}/product/{id}/update', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/{user_id}/product/{id}/destroy', [AdminController::class, 'delete'])->name('admin.destroy');
Route::get('/profile/{id}', [AdminController::class, 'show'])->name('admin.show');

Route::get('/profile/store', [UserController::class, 'store'])->name('user.store');