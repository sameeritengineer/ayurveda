<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ShippingRule,UserAddress,Order,Product,OrderProducts,Transaction};
use Auth;
use Cart;
use App\Jobs\OrderConfirmationMailJob;
use Illuminate\Support\Facades\Session;
use App\Services\TwilioService;

class PaymentController extends Controller
{
    //
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function payWithrzform(){
        $sessionData = session()->get('shippingDetails');
        if(empty($sessionData['payment_method_id'])){
            return redirect()->route('user.checkout');
        }
        return view('frontend.product.razorpay');
    }
    public function payWithRazorPay(Request $request)
    {
        // Validate the request
    $request->validate([
        'paymentMethod' => 'required|string',
        'paymentStatus' => 'required|string',
        'transactionId' => 'required|string',
        'amount' => 'required|numeric',
        'currency' => 'required|string'
    ]);

       $this->storeOrder($request->paymentMethod,$request->paymentStatus, $request->transactionId, $request->amount,$request->currency);

       // clear session
       $this->clearSession();

       return redirect()->route('user.payment.success');
    }
    public function payWithCod(){
        $sessionData = session()->get('shippingDetails');
        if(empty($sessionData['payment_method_id'])){
            return redirect()->route('user.checkout');
        }

        // amount calculation
       $total = getFinalPayableAmount();
       $payableAmount = round($total, 2);
       $currency_name = 'INR';


      $this->storeOrder('COD', 0, \Str::random(10), $payableAmount,$currency_name);

       // clear session
       $this->clearSession();

       return redirect()->route('user.payment.success');

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

        //return $order;
        $order->save();

        // store order products
        foreach(Cart::content() as $item){
            $product = Product::find($item->id);
            $orderProduct = new OrderProducts();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->id;
            $orderProduct->product_name = $product->name;
            $orderProduct->unit_price = $item->price;
            $orderProduct->qty = $item->qty;
            $orderProduct->save();

            // update product quantity
            $updatedQty = ($product->qty - $item->qty);
            $product->qty = $updatedQty;
            $product->save();
        }

        // store transaction details
        $transaction = new Transaction();
        $transaction->order_id = $order->id;
        $transaction->transaction_id = $transactionId;
        $transaction->payment_method = $paymentMethod;
        $transaction->amount = getFinalPayableAmount();
        $transaction->amount_real_currency = $paidAmount;
        $transaction->amount_real_currency_name = $paidCurrencyName;
        $transaction->save();

        //प्रेषण कार्य
        dispatch(new OrderConfirmationMailJob($order)); //dispaching job

        #------twilio sms code start-------#

        $address = UserAddress::with('country_details')->findOrFail($sessionData['shipping_address_id']);
        $data = [
            'name' => $address->name, // Directly access the 'name' field
            'order_id' => $order->id,
        ];
        $phone_no = $this->getCompleteMobileNo($address, $address->phone); // Access the phone directly from the model

        $this->twilioService->sendSmsWithTemplate($phone_no, 'order_placed', $data);

       #------twilio sms code end-------#
       
    }

    public function clearSession()
    {
        Cart::destroy();
        Session::forget('shippingDetails');
        Session::forget('coupon');
    }

    public function paymentSuccess()
    {
        return view('frontend.product.payment-success');
    }

    public function getCompleteMobileNo($address, $no){
        return '+'.$address->country_details->phonecode.$no;
    }
}
