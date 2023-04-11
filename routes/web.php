<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProductController;

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

Route::get('/', [App\Http\Controllers\CartController::class, 'showList'])->name('show.list');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change-password', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showForm'])->name('change.password');
Route::post('/change-password', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'updatePassword'])->name('update.password');
Route::get('show-list', [App\Http\Controllers\CartController::class, 'showList'])->name('show.list');

Route::prefix('admin')->middleware(['auth', 'checkAdmin'])->group(function () {
    Route::get('/change-password', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showForm'])->name('change.password');
    Route::post('/change-password', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'updatePassword'])->name('update.password');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});


Route::prefix('cart')->group(function(){
    Route::get('show', [App\Http\Controllers\CartController::class, 'showCart'])->name('show.cart')->middleware(['auth']);
    Route::get('show-detail-product/{id}', [App\Http\Controllers\CartController::class, 'showDetailProduct'])->name('cart.detail.product');
    Route::post('update', [App\Http\Controllers\CartController::class, 'updateCart'])->name('update.to.cart'); 
    Route::get('add-to-cart/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('add.to.cart')->middleware(['auth']);
    Route::get('delete-item-cart/{session_id}', [App\Http\Controllers\CartController::class, 'removeItem'])->name('delete.to.cart');
    Route::get('delete-all-cart', [App\Http\Controllers\CartController::class, 'removeAll'])->name('delete.all.cart');
    Route::post('checkout-cart', [App\Http\Controllers\CartController::class, 'chekoutCart'])->name('checkout.cart')->middleware('auth');
});