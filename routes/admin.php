<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageGalleryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ShippingRuleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','adminM'])->group(function(){
    Route::get('/dashboard',[HomeController::class,'index'])->name('adminDash');
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

    /* Coupon Route */
    Route::put('shippingrule/change-status', [ShippingRuleController::class, 'changeStatus'])->name('shippingrule.change-status');
    Route::resource('shippingrules', ShippingRuleController::class);
});
?>