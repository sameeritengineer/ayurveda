<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAddress;
use App\Models\ShippingRule;
use Auth;
use Cart;

class CheckOutController extends Controller
{
    //
    public function index()
    {
        $cartItems = Cart::content();
        if(count($cartItems) === 0){
            return redirect()->route('homepage');
        }

        $addresses = UserAddress::where('user_id', Auth::user()->id)->get();
        $shippingMethods = ShippingRule::where('status', 1)->get();
        return view('frontend.product.checkout',compact('addresses','cartItems','shippingMethods'));
    }

    public function checkOutFormSubmit(Request $request){
        $request->validate([
            'shipping_method_id' => ['required', 'integer'],
            'shipping_address_id' => ['required', 'integer'],
        ]);
        
        $sessionData = session()->put('shippingDetails',[
                       "shipping_method_id" => $request->shipping_method_id,
                       "shipping_address_id" => $request->shipping_address_id,
                       "payment_method_id" => $request->payment_method_id]);
       
        if($request->payment_method_id == 'cod'){
            return response(['status' => 'success', 'redirect_url' => route('user.cod.payment')]);
        }else{
            return response(['status' => 'success', 'redirect_url' => route('user.razor.form')]);
        }               

    }
}
