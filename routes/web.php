<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageGalleryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\{UserController, AddressController};
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Frontend\FproductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\BlogpageController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Jobs\OrderConfirmationMailJob;
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


/** Homepage and Other pages Routes **/
Route::get('/',[HomepageController::class,'index'])->name('homepage');
Route::get('/blogs',[BlogpageController::class,'index'])->name('all-blogs');
Route::get('/blogs/{slug}',[BlogpageController::class,'singleblog'])->name('single-blog');
Route::get('/testimonials',[PageController::class,'testimonials'])->name('testimonials');
Route::get('/faqs',[PageController::class,'faqs'])->name('faqs');
Route::get('/contact',[PageController::class,'contact'])->name('contact');
Route::post('/postcontact',[PageController::class,'postcontact'])->name('postcontact');
Route::get('/about-us',[PageController::class,'about'])->name('about');
Route::get('/pages/{slug}',[PageController::class,'pages'])->name('pages');
Route::post('/newsletter',[PageController::class,'newsletter'])->name('newsletter');
Route::get('cart-not-found', [CartController::class, 'cartNotFound'])->name('cart-not-found');



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


Route::group(['middleware' =>['auth'], 'prefix' => 'user', 'as' => 'user.'], function(){
/** Checkout routes */
Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
Route::post('checkout/form-submit', [CheckOutController::class, 'checkOutFormSubmit'])->name('checkout.form-submit');


/** Payment routes */
Route::get('cod/payment', [PaymentController::class, 'payWithCod'])->name('cod.payment');
Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

 /** Razorpay routes */
Route::get('razorpay/payment', [PaymentController::class, 'payWithrzform'])->name('razor.form');
Route::post('razorpay/payment', [PaymentController::class, 'payWithRazorPay'])->name('razorpay.payment');

});

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/dashboard',[UserController::class,'index'])->name('userdashboard');
    Route::get('profile', [UserController::class, 'userindex'])->name('user.profile');
    Route::put('profile', [UserController::class, 'updateProfile'])->name('user.profileUpdate');
    Route::post('profile', [UserController::class, 'updatePassword'])->name('user.update.password');
    Route::get('reviews', [UserController::class, 'reviews'])->name('user.review');

    /** Order Routes */
    Route::get('orders', [UserController::class, 'orderIndex'])->name('user.orders.index');
    Route::get('orders/pending', [UserController::class, 'pendingOrders'])->name('user.orders.pending');
    Route::get('orders/completed', [UserController::class, 'completedOrders'])->name('user.orders.completed');
    Route::get('orders/cancelled', [UserController::class, 'cancelledOrders'])->name('user.orders.cancelled');
    Route::get('orders/show/{id}', [UserController::class, 'orderShow'])->name('user.orders.show');
    //user address related routes
    Route::get('address', [AddressController::class, 'address'])->name('user.address');
    Route::delete ('address/delete/{id}', [AddressController::class, 'addressDelete'])->name('user.address.delete');
    Route::get('address/edit/{id}', [AddressController::class, 'addressEdit'])->name('user.address.edit');
    Route::get('add-address', [AddressController::class, 'addAddress'])->name('user.add-address');
    Route::post('store-address', [AddressController::class, 'storeAddress'])->name('user.store-address');
    Route::get('/get-states/{country_id}', [AddressController::class, 'getStates'])->name('user.get-states');
    Route::get('/get-cities/{state_id}', [AddressController::class, 'getCities'])->name('user.get-cities');
    Route::get('address-add', [AddressController::class, 'addressAdd'])->name('user.address-add');
    Route::post('address-store', [AddressController::class, 'addressStore'])->name('user.address-store');
    Route::put('address-update/{id?}', [AddressController::class, 'addressUpdate'])->name('user.address-update');

    /** product review routes */
    Route::post('review', [ReviewController::class, 'create'])->name('user.review.create');

    Route::get('cancel-order/{id?}', [AddressController::class, 'cancelOrder'])->name('user.cancel-order');
});

require __DIR__.'/auth.php';


Route::get('or',function(){
   $order =  \App\Models\Order::find(2);
   dispatch(new OrderConfirmationMailJob($order));
});

//add new variable in .env ADMIN_EMAIL = avinashsmartitventures@gmail.com

use Twilio\Rest\Client;

Route::get('/send-sms', function () {
    // Twilio credentials from .env
    $sid = env('TWILIO_SID');
    $authToken = env('TWILIO_AUTH_TOKEN');
    $twilioNumber = env('TWILIO_PHONE_NUMBER');

    // The phone number you want to send the message to
    $recipientNumber = '+919877047825';  // Replace with the recipient's phone number

    // The message content
    $messageContent = 'Hello! This is a test message from your Laravel app.';

    try {
        // Initialize Twilio client
        $client = new Client($sid, $authToken);

        // Send the SMS
        $message = $client->messages->create(
            $recipientNumber, // To number
            [
                'from' => $twilioNumber,
                'body' => $messageContent,
            ]
        );

        return 'Message sent successfully to ' . $recipientNumber;
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
