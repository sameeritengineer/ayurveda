<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ShippingRule,UserAddress,Order};
use Auth;

class PaymentController extends Controller
{
    //
    public function payWithCod(){
        $sessionData = session()->get('shippingDetails');
        if(empty($sessionData['payment_method_id'])){
            return redirect()->route('user.checkout');
        }
        
        // amount calculation
       $total = getFinalPayableAmount();
       $payableAmount = round($total, 2);
       $currency_name = 'INR';


       return $this->storeOrder('COD', 0, \Str::random(10), $payableAmount,$currency_name);

       // clear session
      // $this->clearSession();
    }

    public function storeOrder($paymentMethod, $paymentStatus, $transactionId, $paidAmount, $paidCurrencyName)
    {
        $coupon = session()->get('coupon');
        $sessionData = session()->get('shippingDetails');
        
        $shippingMethod = ShippingRule::findOrFail($sessionData['shipping_method_id'],['id','name','type','cost']);
        $address = UserAddress::findOrFail($sessionData['shipping_address_id'])->toArray();

        $order = new Order();
        $order->invocie_id = rand(1, 999999);
        $order->user_id = Auth::user()->id;
        $order->sub_total = getCartTotal();
        $order->amount =  getFinalPayableAmount();
        $order->currency_name = $paidCurrencyName;
        $order->currency_icon = getCurrencySymbol($paidCurrencyName);
        $order->product_qty = \Cart::content()->count();
        $order->payment_method = $paymentMethod;
        $order->payment_status = $paymentStatus;
        $order->order_address = json_encode($address);
        $order->shpping_method = json_encode($shippingMethod);
        $order->coupon = json_encode($coupon);
        $order->order_status = 'pending';

        return $order;
        //$order->save();

    }    
}
