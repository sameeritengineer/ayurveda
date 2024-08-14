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
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CustomerListController;
use App\Http\Controllers\AdminListController;
use App\Http\Controllers\ManageUserController;


use Illuminate\Support\Facades\Route;


Route::middleware(['auth','adminM'])->group(function(){
    Route::get('/dashboard',[HomeController::class,'index'])->name('adminDash');
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('adminDash');
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

    /* Shipping Route */
    Route::put('shippingrule/change-status', [ShippingRuleController::class, 'changeStatus'])->name('shippingrule.change-status');
    Route::resource('shippingrules', ShippingRuleController::class);

    /* Faq Route */
    Route::resource('faqs', FaqController::class);

    /* Pages Route */
    Route::resource('pages', PageController::class);

    /* Order Route */
    Route::get('canceled-orders', [OrderController::class, 'canceledOrders'])->name('canceled-orders');
    Route::get('delivered-orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');
    Route::get('out-for-delivery-orders', [OrderController::class, 'outForDeliveryOrders'])->name('out-for-delivery-orders');
    Route::get('shipped-orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');
    Route::get('dropped-off-orders', [OrderController::class, 'droppedOfOrders'])->name('dropped-off-orders');
    Route::get('processed-orders', [OrderController::class, 'processedOrders'])->name('processed-orders');
    Route::get('pending-orders', [OrderController::class, 'pendingOrders'])->name('pending-orders');
    Route::get('payment-status', [OrderController::class, 'changePaymentStatus'])->name('payment.status');
    Route::get('order-status', [OrderController::class, 'changeOrderStatus'])->name('order.status');
    Route::resource('order', OrderController::class);

    /** Order Transaction route */
    Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');

    /** Customer list routes */
    Route::get('customer', [CustomerListController::class, 'index'])->name('customer.index');

    /** Admin User list routes */
    Route::delete('admin-list/{id}', [AdminListController::class, 'destory'])->name('admin-list.destory');
    Route::get('admin-list', [AdminListController::class, 'index'])->name('admin-list.index');

    /** manage user routes */
Route::get('manage-user', [ManageUserController::class, 'index'])->name('manage-user.index');
Route::post('manage-user', [ManageUserController::class, 'create'])->name('manage-user.create');
});
?>
