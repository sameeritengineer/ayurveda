<?php

use App\Models\ShippingRule;
use Illuminate\Support\Facades\Session;

    // common function for image uploading
    if (!function_exists('upload_image')) {
        function upload_image($uploadPath,$image) {
            $ext = $image->getClientOriginalExtension(); // Get the file extension
            // Generate a unique name based on the current time in microseconds
            $microtime = microtime(true); 
            $name = sprintf('%s.%s', str_replace('.', '', $microtime), $ext);
            $file_url = $uploadPath . $name;
            $image->move($uploadPath, $name);
            return $file_url;
        }
    }

    
// Frontend Helper functions

function checkDiscount($product) {
    $currentDate = date('Y-m-d');

    if($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date) {
        return true;
    }

    return false;
}

// Function to return currency symbol based on currency code
function getCurrencySymbol($currencyCode) {
    // Define an array with currency codes and their symbols
    $currencySymbols = array(
        'USD' => '$',
        'EUR' => '€',
        'GBP' => '£',
        'JPY' => '¥',
        'INR' => '₹',
        // Add more currencies as needed
    );

    // Convert the currency code to uppercase for consistency
    $currencyCode = strtoupper($currencyCode);

    // Check if the currency code exists in the array
    if (array_key_exists($currencyCode, $currencySymbols)) {
        return $currencySymbols[$currencyCode];
    } else {
        return 'Currency symbol not found';
    }
}

/** get total cart amount */

function getCartTotal(){
    $total = 0;
    foreach(\Cart::content() as $product){
        $total += ($product->price) * $product->qty;
    }
    return $total;
}

/** get payable total amount */
function getMainCartTotal(){
    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if($coupon['discount_type'] === 'amount'){
            $total = $subTotal - $coupon['discount'];
            return $total;
        }elseif($coupon['discount_type'] === 'percent'){
            //$discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
            $discount = ($subTotal * $coupon['discount'] / 100);
            $total = $subTotal - $discount;
            return $total;
        }
    }else {
        return getCartTotal();
    }
}

/** get cart discount */
function getCartDiscount(){
    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if($coupon['discount_type'] === 'amount'){
            return $coupon['discount'];
        }elseif($coupon['discount_type'] === 'percent'){
            //$discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
            $discount = ($subTotal * $coupon['discount'] / 100);
            return $discount;
        }
    }else {
        return 0;
    }
}

/** get selected shipping fee from session */
function getShppingFee(){
    if(Session::has('shippingDetails')){
        $shipping_method_id = Session::get('shippingDetails')['shipping_method_id'];
        $data = ShippingRule::where('id',$shipping_method_id)->first();
        return $data->cost;
    }else {
        return 0;
    }
}

/** get payable amount */
function getFinalPayableAmount(){
    return  getMainCartTotal() + getShppingFee();
}

/** short descriptin */
function truncateTo100Words($content) {
    $words = explode(' ', $content);
    if (count($words) > 10) {
        $words = array_slice($words, 0, 10);
        $content = implode(' ', $words) . '...';
    }

    return $content;
}


?>