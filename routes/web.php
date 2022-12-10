<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Member Only
Route::middleware('role:member')->group(function () {
  Route::prefix('/cart')->name('cart.')->group(function () {
    Route::post('/', [CartController::class, 'store'])->name('store');
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::get('edit/{cartDetail}', [CartController::class, 'edit'])->name('edit');
    Route::patch('update/{cartDetail}', [CartController::class, 'update'])->name('update');
    Route::delete('{cartDetail}', [CartController::class, 'destroy'])->name('delete');
  });
  Route::get('/transaction', [TransactionController::class, 'index'])->name('trx');
  Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
});

Route::get('/product/search', [ProductController::class, 'indexSearch'])->name('index.search');

Route::resource('product', ProductController::class)->only(['create', 'store', 'show', 'destroy']);

Route::get('/profile-edit', [UserController::class, 'edit'])->name('profile.edit');

Route::put('/profile-edit', [UserController::class, 'update'])->name('profile.update');

//Member And Admin
Route::middleware('auth')->group(function () {
  Route::get('/product', [ProductController::class, 'index'])->name('index');

  Route::get('/product-detail/{id}', [ProductController::class, 'show'])->name('detail');

  Route::get('/logout', [AuthController::class, 'logout']);

  Route::get('/profile', [UserController::class, 'show'])->name('profile');

  Route::get('/change-password', [UserController::class, 'editPassword'])->name('password.edit');

  Route::post('/change-password', [UserController::class, 'updatePassword'])->name('password.update');
});

//Member, Admin, Guest
Route::get('/', [IndexController::class, 'welcome'])->name('welcome');

// Guest
Route::middleware('guest')->name('auth.')->group(function () {

  Route::prefix('/login')->group(function () {
    Route::get('/', [AuthController::class, 'signin'])->name('signin');
    Route::post('/', [AuthController::class, 'login'])->name('login');
  });

  Route::prefix('/register')->group(function () {
    Route::get('/', [AuthController::class, 'signup'])->name('signup');
    Route::post('/', [AuthController::class, 'register'])->name('register');
  });
});