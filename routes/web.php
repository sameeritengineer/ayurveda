<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageGalleryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Frontend\FproductController;
use App\Http\Controllers\Frontend\CartController;
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

Route::get('/', function () {
    //return view('welcome');
    return view('frontend.home.home');
})->name('homepage');

/** Product route */
Route::get('/all-products',[FproductController::class,'index'])->name('getProducts');
Route::get('product-detail/{slug}', [FproductController::class, 'showProduct'])->name('product-detail');

/** Cart routes */
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart-count', [CartController::class, 'getCartCount'])->name('cart-count');
Route::get('cart-details', [CartController::class, 'cartDetails'])->name('cart-details');
Route::post('cart/update-quantity', [CartController::class, 'updateProductQty'])->name('cart.update-quantity');
Route::get('cart/product-total', [CartController::class, 'cartTotal'])->name('cart.product-total');
Route::get('cart/remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('cart.remove-product');
Route::get('clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');

Route::get('apply-coupon', [CartController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('coupon-calculation', [CartController::class, 'couponCalculation'])->name('coupon-calculation');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth','adminM'])->group(function(){
    Route::get('/admin/dashboard',[HomeController::class,'index'])->name('adminDash');
    Route::resource('categories', CategoryController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('blogs', BlogController::class);
    Route::get('/create-setting',[SettingController::class,'create'])->name('create-setting');
    Route::post('/save-setting',[SettingController::class,'save'])->name('save-setting');
    /** Products image gallery route */
    Route::resource('products-image-gallery', ProductImageGalleryController::class);
    Route::get('product/get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
    Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
    Route::resource('products', ProductController::class);

    /* Coupon Route */
    Route::put('coupon/change-status', [CouponController::class, 'changeStatus'])->name('coupon.change-status');
    Route::resource('coupons', CouponController::class);
});
