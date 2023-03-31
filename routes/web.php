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

Route::get('/', fn () => view('welcome'));

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'checkAdmin'])->group(function () {
    Route::get('/change-password', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showForm'])->name('change.password');
    Route::post('/update-password', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'updatePassword'])->name('update.password');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/change-password', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showForm'])->name('change.password');
Route::post('/update-password', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'updatePassword'])->name('update.password');


Route::get('/user', [App\Http\Controllers\admin\DashboardController::class, 'index']);
