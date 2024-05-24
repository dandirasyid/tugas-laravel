<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
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

// Route::get('/', function () {
//     return view('welcome');

// });

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}/detail', [ProductController::class, 'detail'])->name('product.detail')->middleware(['authenticate', 'role:superadmin|user']);
Route::get('/transaction-detail/{id}', [ProductController::class, 'transaksi'])->name('product.transaksi')->middleware(['authenticate', 'role:superadmin|user']);
// create transaksi invoice
Route::get('/transaction-create/{id}', [ProductController::class, 'createTransaksi'])->name('product.create.transaksi')->middleware(['authenticate', 'role:superadmin|user']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(['authenticate', 'role:superadmin|user']);

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware(['authenticate', 'role:superadmin|user']);

// Admin and Product Crud
Route::get('/dashboard/products', [AdminController::class, 'index'])->name('admin.index')->middleware(['authenticate', 'role:superadmin|user']);
Route::get('/dashboard/products/add', [AdminController::class, 'create'])->name('admin.create')->middleware(['authenticate', 'role:superadmin|user']);
Route::post('/dashboard/products/store', [AdminController::class, 'store'])->name('admin.store')->middleware(['authenticate', 'role:superadmin|user']);
Route::get('/{user_id}/product/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit')->middleware(['authenticate', 'role:superadmin|user']);
Route::put('/{user_id}/product/{id}/update', [AdminController::class, 'update'])->name('admin.update')->middleware(['authenticate', 'role:superadmin|user']);
Route::delete('/{user_id}/product/{id}/destroy', [AdminController::class, 'delete'])->name('admin.destroy')->middleware(['authenticate', 'role:superadmin|user']);
Route::get('/export', [AdminController::class, 'exportProduct'])->name('admin.products.export')->middleware(['authenticate', 'role:superadmin|user']);
Route::post('/import', [AdminController::class, 'importProduct'])->name('admin.products.import')->middleware(['authenticate', 'role:superadmin|user']);

// User
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register_user');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('login_user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/login/google', [UserController::class, 'loginGoogle'])->name('login_google');
Route::get('/login/google/callback', [UserController::class, 'loginGoogleCallback'])->name('callback_google');

//User Crud 
Route::get('/dashboard/users', [UserController::class, 'index'])->name('user.index')->middleware(['authenticate', 'role:superadmin']);
Route::get('/dashboard/users/add', [UserController::class, 'create'])->name('user.create')->middleware(['authenticate', 'role:superadmin']);
Route::post('/dashboard/user/store', [UserController::class, 'store'])->name('user.store')->middleware(['authenticate', 'role:superadmin']);
Route::get('/dashboard/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware(['authenticate', 'role:superadmin']);
Route::put('/dashboard/user/update/{id}', [UserController::class, 'update'])->name('user.update')->middleware(['authenticate', 'role:superadmin']);
Route::delete('/dashboard/user/destroy/{id}', [UserController::class, 'delete'])->name('user.destroy')->middleware(['authenticate', 'role:superadmin']);
