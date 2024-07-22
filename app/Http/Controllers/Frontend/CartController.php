<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /** Show cart page  */
    public function cartDetails()
    {
        $cartItems = Cart::content();

        if(count($cartItems) === 0){
            Session::forget('coupon');
            return redirect()->route('homepage');
        }

        return view('frontend.product.cart-detail', compact('cartItems'));
    }

    public function addToCart(Request $request){
    //return $request->all();   
      
    $product = Product::findOrFail($request->product_id);

    // check product quantity
    if($product->qty === 0){
            return response(['status' => 'error', 'message' => 'Product stock out']);
    }elseif($request->qty > $product->qty ){
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock']);
    }

    /** check discount */
    $productPrice = 0;

    if(checkDiscount($product)){
        $productPrice = $product->offer_price;
    }else {
        $productPrice = $product->price;
    }

    $cartData = [];
    $cartData['id'] = $product->id;
    $cartData['name'] = $product->name;
    $cartData['qty'] = $request->qty;
    $cartData['price'] = $productPrice;
    $cartData['options']['image'] = $product->thumb_image;
    $cartData['options']['slug'] = $product->slug;
    $cartData['weight'] = 0;
    

    Cart::add($cartData);
    return response(['status' => 'success', 'message' => 'Added to cart successfully!']);
    }

    public function getCartCount()
    {
        return Cart::content()->count();
    }

    /** Update product quantity */
    public function updateProductQty(Request $request)
    {
        $productId = Cart::get($request->rowId)->id;
        $product = Product::findOrFail($productId);

        // check product quantity
        if($product->qty === 0){
            return response(['status' => 'error', 'message' => 'Product stock out']);
        }elseif($product->qty < $request->qty){
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock']);
        }

        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);

        return response(['status' => 'success', 'message' => 'Product Quantity Updated!', 'product_total' => $productTotal]);
    }

    /** get product total */
    public function getProductTotal($rowId)
    {
       $product = Cart::get($rowId);
       $total = ($product->price) * $product->qty;
       return $total;
    }
    /** get cart total amount */
    public function cartTotal()
    {
        $total = 0;
        foreach(Cart::content() as $product){
            $total += $this->getProductTotal($product->rowId);
        }

        return $total;
    }
    /** Remove product form cart */
    public function removeProduct($rowId)
    {
        Cart::remove($rowId);
        //toastr('Product removed succesfully!', 'success', 'Success');
        return redirect()->back();
    }
    /** clear all cart products */
    public function clearCart()
    {
        Cart::destroy();

        return response(['status' => 'success', 'message' => 'Cart cleared successfully']);
    }

        /** Apply coupon */
        public function applyCoupon(Request $request)
        {
            if($request->coupon_code === null){
                return response(['status' => 'error', 'message' => 'Coupon filed is required']);
            }
    
            $coupon = Coupon::where(['code' => $request->coupon_code, 'status' => 1])->first();
    
            if($coupon === null){
                return response(['status' => 'error', 'message' => 'Coupon not exist!']);
            }elseif($coupon->start_date > date('Y-m-d')){
                return response(['status' => 'error', 'message' => 'Coupon not exist!']);
            }elseif($coupon->end_date < date('Y-m-d')){
                return response(['status' => 'error', 'message' => 'Coupon is expired']);
            }elseif($coupon->total_used >= $coupon->quantity){
                return response(['status' => 'error', 'message' => 'you can not apply this coupon']);
            }
    
            if($coupon->discount_type === 'amount'){
                Session::put('coupon', [
                    'coupon_name' => $coupon->name,
                    'coupon_code' => $coupon->code,
                    'discount_type' => 'amount',
                    'discount' => $coupon->discount
                ]);
            }elseif($coupon->discount_type === 'percent'){
                Session::put('coupon', [
                    'coupon_name' => $coupon->name,
                    'coupon_code' => $coupon->code,
                    'discount_type' => 'percent',
                    'discount' => $coupon->discount
                ]);
            }
    
            return response(['status' => 'success', 'message' => 'Coupon applied successfully!']);
        }
    
        /** Calculate coupon discount */
        public function couponCalculation()
        {
            if(Session::has('coupon')){
                $coupon = Session::get('coupon');
                $subTotal = getCartTotal();
                if($coupon['discount_type'] === 'amount'){
                    $total = $subTotal - $coupon['discount'];
                    return response(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
                }elseif($coupon['discount_type'] === 'percent'){
                    $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
                    $total = $subTotal - $discount;
                    return response(['status' => 'success', 'cart_total' => $total, 'discount' => $discount]);
                }
            }else {
                $total = getCartTotal();
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => 0]);
            }
        }
}
