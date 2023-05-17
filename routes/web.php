<?php

use Illuminate\Support\Facades\Route;
//admin
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MenuTypeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CouponController;
//use
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\CartController;
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
Route::resource('/admin/coupon', CouponController::class)->middleware('checklogin');
Route::get('/admin/order', [OrderController::class, 'index'])->middleware('checklogin');
Route::get('/admin/order-done', [OrderController::class, 'orderDove'])->middleware('checklogin');
Route::get('/admin/order-faill', [OrderController::class, 'orderFaill'])->middleware('checklogin');
//share mail
Route::get('/share-mail',[ AdminController::class ,'shareMail']);


//don hang
Route::get('/admin/order-detail/{id}', [OrderController::class, 'orderDetail'])->middleware('checklogin');
Route::get('/admin/order-delete/{id}', [OrderController::class, 'orderDestroy'])->middleware('checklogin');
Route::get('/admin/order-accept/{id}', [OrderController::class, 'acceptOrder'])->middleware('checklogin');
Route::get('/admin/order-cancel/{id}', [OrderController::class, 'cancelOrder'])->middleware('checklogin');
Route::get('/admin/order-delivery/{id}', [OrderController::class, 'deliveryOrder'])->middleware('checklogin');
Route::get('/admin/order-delivery-done/{id}', [OrderController::class, 'deliveryOrderDone'])->middleware('checklogin');
Route::get('/admin/order-delivery-faill/{id}', [OrderController::class, 'deliveryOrderFaill'])->middleware('checklogin');

//ma giam gia 
Route::post('/check-coupon',[CartController::class, 'checkCoupon']);

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
Route::get('/check-out',[CartController::class, 'checkOut'])->middleware('checkCart');
Route::post('/save-order',[CartController::class, 'saveOrder']);
//cart ajax
Route::post('/add-cart-ajax',[CartController::class, 'saveCartAjax']);
Route::get('/show-cart-ajax',[CartController::class, 'showCartAjax']);
Route::get('/delete-cart-ajax/{session_id}',[CartController::class, 'deleteCartAjax']);
Route::post('/update-cart-ajax',[CartController::class, 'updateCartAjax']);
Route::get('/check-out-ajax',[CartController::class, 'checkOutAjax']);
Route::post('/save-order-ajax',[CartController::class, 'saveOrderAjax']);
// Route::get('/tks-out',[CartController::class, 'tksOut']);

//tim kiem 
Route::post('/tim-kiem',[ IndexController::class ,'timkiem']);
Route::post('/timkiem-ajax',[ IndexController::class ,'timkiemajax']);