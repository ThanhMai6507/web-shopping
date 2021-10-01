<?php

use Illuminate\Support\Facades\Route;
//admin
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MenuTypeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\AdminController;
//use
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\CartController;


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

//login admin controller
Route::get('/admin/login',[ AdminController::class ,'indexLogin']);
Route::post('/admin/post-login', [AdminController::class, 'checkLoginAdmin']);

Auth::routes();

//admin
Route::get('/admin/home', [HomeController::class, 'index'])->middleware('checklogin');
Route::resource('/admin/slide', SlideController::class)->middleware('checklogin');
Route::resource('/admin/menu-type', MenuTypeController::class)->middleware('checklogin');
Route::resource('/admin/category', CategoryController::class)->middleware('checklogin');
Route::resource('/admin/product', ProductController::class)->middleware('checklogin');


//user
Route::get('/', [IndexController::class, 'index']);
Route::get('/danh-muc/{slug}',[ IndexController::class ,'category']);
Route::get('/san-pham/{slug}',[ IndexController::class ,'detailProduct']);
//user dang nhap vs dang ki 
Route::get('/user-login',[UserController::class, 'loginUser']);
Route::get('/user-register',[UserController::class, 'registerUser']);
//cart
Route::post('/save-cart',[CartController::class, 'saveCart']);
Route::get('/show-cart',[CartController::class, 'showCart']);
Route::get('/delete-cart/{rowId}',[CartController::class, 'deleteCart']);
Route::post('/update-cart-quantity',[CartController::class, 'updateCart']);
Route::get('/check-out',[CartController::class, 'checkOut']);
Route::post('/save-order',[CartController::class, 'saveOrder']);
Route::get('/tks-out',[CartController::class, 'tksOut']);