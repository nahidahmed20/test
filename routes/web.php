<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopegridController;
use  App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\UserController;
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

Route::get('/',[ShopegridController::class,'index'])->name('home');
Route::get('/product-category/{id}',[ShopegridController::class,'category'])->name('product-category');
Route::get('/product-subCategory/{id}',[ShopegridController::class,'subCategory'])->name('product-sub-category');
Route::get('/product-detail/{id}',[ShopegridController::class,'product'])->name('product-detail');
Route::get('/cart/show',[CartController::class,'index'])->name('cart.show');
Route::post('/cart-add/{id}',[CartController::class,'addToCart'])->name('cart.add');
Route::post('/cart/update',[CartController::class,'update'])->name('cart.update');
Route::get('/cart/remove/{rowId}',[CartController::class,'remove'])->name('cart.remove');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/confirm-order',[CheckoutController::class,'newOrder'])->name('confirm-order');
Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');

Route::get('/customer-login',[CustomerAuthController::class,'index'])->name('customer-login');
Route::get('/customer-register',[CustomerAuthController::class,'register'])->name('customer-register');
Route::post('/customer-login',[CustomerAuthController::class,'login'])->name('customer-login');
Route::post('/customer-register',[CustomerAuthController::class,'newCustomer'])->name('customer-register');

Route::middleware(['customer'])->group(function (){
    Route::get('/customer-dashboard',[CustomerAuthController::class,'dashboard'])->name('customer.dashboard');
    Route::get('/customer/change-password',[CustomerAuthController::class,'changePassword'])->name('customer.change-password');
    Route::post('/customer/update-password',[CustomerAuthController::class,'updatePassword'])->name('customer.update-password');
    Route::get('/customer-logout',[CustomerAuthController::class,'logout'])->name('customer-logout');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('courier',CourierController::class);
    Route::resource('user',UserController::class);

    Route::get('/category/add',[CategoryController::class,'create'])->name('category.add');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/manage',[CategoryController::class,'index'])->name('category.manage');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');


    Route::get('sub-category/add',[SubCategoryController::class,'create'])->name('sub-category.add');
    Route::post('sub-category/store',[SubCategoryController::class,'store'])->name('sub-category.store');
    Route::get('sub-category/manage',[SubCategoryController::class,'index'])->name('sub-category.manage');
    Route::get('sub-category/edit/{id}',[SubCategoryController::class,'edit'])->name('sub-category.edit');
    Route::post('sub-category/update/{id}',[SubCategoryController::class,'update'])->name('sub-category.update');
    Route::get('sub-category/delete/{id}',[SubCategoryController::class,'delete'])->name('sub-category.delete');

    Route::get('/brand/add',[BrandController::class,'create'])->name('brand.add');
    Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('/brand/manage',[BrandController::class,'index'])->name('brand.manage');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

    Route::get('/unit/add',[UnitController::class,'create'])->name('unit.add');
    Route::post('/unit/store',[UnitController::class,'store'])->name('unit.store');
    Route::get('/unit/manage',[UnitController::class,'index'])->name('unit.manage');
    Route::get('/unit/edit/{id}',[UnitController::class,'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}',[UnitController::class,'update'])->name('unit.update');
    Route::get('/unit/delete/{id}',[UnitController::class,'delete'])->name('unit.delete');

    Route::get('/product/add',[ProductController::class,'create'])->name('product.add');
    Route::get('/get-subcategory-by-category',[ProductController::class,'getSubCategoryByCategory'])->name('get-subcategory-by-category');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/manage',[ProductController::class,'index'])->name('product.manage');
    Route::get('/product/detail/{id}',[ProductController::class,'detail'])->name('product.detail');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

    Route::get('/admin-order/manage',[AdminOrderController::class,'index'])->name('admin-order.manage');
    Route::get('/admin-order/detail{id}',[AdminOrderController::class,'detail'])->name('admin-order.detail');
    Route::get('/admin-order/edit{id}',[AdminOrderController::class,'edit'])->name('admin-order.edit');
    Route::post('/admin-order/update{id}',[AdminOrderController::class,'update'])->name('admin-order.update');
    Route::get('/admin-order/show-invoice{id}',[AdminOrderController::class,'showInvoice'])->name('admin-order.show-invoice');
    Route::get('/admin-order/download-invoice{id}',[AdminOrderController::class,'downloadInvoice'])->name('admin-order.download-invoice');
    Route::get('/admin-order/delete{id}',[AdminOrderController::class,'delete'])->name('admin-order.delete');
});

    // SSLCOMMERZ Start
    Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
    //SSLCOMMERZ END
