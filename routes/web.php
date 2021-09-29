<?php

use Illuminate\Support\Facades\Route;
//admin
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MenuTypeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlideController;
//use
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\UserController;


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



Auth::routes();

//admin
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/slide', SlideController::class);
Route::resource('/menu-type', MenuTypeController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/product', ProductController::class);


//user
Route::get('/', [IndexController::class, 'index']);
Route::get('/danh-muc/{slug}',[ IndexController::class ,'category']);
Route::get('/san-pham/{slug}',[ IndexController::class ,'detailProduct']);
//user dang nhap vs dang ki 
Route::get('/user-login',[UserController::class, 'loginUser']);
Route::post('/check-login', [UserController::class,'checklogin']);
Route::get('/user-register',[UserController::class, 'registerUser']);
Route::post('/check-register', [UserController::class,'checkregister']);