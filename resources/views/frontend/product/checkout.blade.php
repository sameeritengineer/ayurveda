@extends('frontend.layouts.app')
@section('content')
<!-- Content Wrapper Start -->
<div class="content-wrapper">

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap bg-f br-1">
    <div class="container">
        <div class="breadcrumb-title">
            <h2>Checkout</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a href="index.html">Home </a></li>
                <li><a href="cart.html">cart </a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout section start -->
<div class="checkout-wrap pt-50 pb-50">
    <div class="container">
        <!-- <div class="checkout-promobox">
            <div class="checkbox">
                <input type="checkbox" id="test_1">
                <label for="test_1">Returning Customer? <a class="link style1" href="my-account.html"> Click  Here To Login</a></label>
            </div>
        </div> -->
        <div class="row">
        <div class="col-6">
                <h3 class="checkout-box-title">Shipping Details </h3>
            </div>
            <div class="col-6 text-right">
                <div class="option-item addressBtn">
                    <a href="@auth {{route('user.add-address')}} @endauth @guest {{route('login')}} @endguest" class="btn btn-primary style1">Add New Address</a>
                </div>
            </div>
        @foreach($addresses as $address)    
        <div class="col-md-4">
    <div class="card mb-3">
        <div class="card-body">
            <div class="form-check mb-3">
                <input class="form-check-input shipping_address" type="radio" data-id="{{$address->id}}" name="address" id="address{{$address->id}}">
                <label class="form-check-label" for="address{{$address->id}}">
                    Select this address
                </label>
            </div>
            <h5 class="card-title">{{$address->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$address->phone}} | {{$address->email}}</h6>
            <p class="card-text">
                {{$address->address}}<br>
                {{$address->state}}, {{$address->city}} {{$address->zip}}<br>
                {{$address->country}}
            </p>
        </div>
    </div>
</div>

        @endforeach    
        </div>       
        <div class="row gx-5">
            <div class="col-lg-4">
            <div class="checkout-details style2">
                    <h3 class="checkout-box-title">Shipping Methods</h3>
                    <div class="bill-details">
                    @foreach($shippingMethods as $methods)    
                    <div class="form-check">
                    <input class="form-check-input shipping_method" type="radio" name="exampleRadios" id="exampleRadios1" value="{{$methods->id}}" data-id="{{$methods->cost}}">
                    <label class="form-check-label" for="exampleRadios1">
                      {{$methods->name}}
                        <span>cost: ({{getCurrencySymbol('INR')}}{{$methods->cost}})</span>
                    </label>
                    </div> 
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-details">
                    <h3 class="checkout-box-title">Checkout Summary</h3>
                    <div class="bill-details">
                        <div class="bill-item-wrap">
                            <div class="bill-item-title">
                                <p class="bill-item-name"><b>Product Name</b></p>
                                <span class="bill-item-price"><b>Total</b></span>
                            </div>
                            @foreach ($cartItems as $item)
                            <div class="bill-item">
                                <p class="bill-item-name">{{$item->name}}</p>
                                <span class="bill-item-price">{{getCurrencySymbol('INR')}}{{$item->price * $item->qty}}</span>
                            </div>
                            @endforeach
   
                            <div class="bill-item-footer">
                                <p class="bill-item-name"><b>Cart Subtotal</b></p>
                                <span class="bill-item-price"><b>{{getCurrencySymbol('INR')}}{{getCartTotal()}}</b></span>
                            </div>
                            <div class="bill-item">
                                <p class="bill-item-name"><b>Discount</b></p>
                                <span class="bill-item-price"><b>{{getCurrencySymbol('INR')}}{{getCartDiscount()}}</b></span>
                            </div>
                            <div class="bill-item">
                                <p class="bill-item-name"><b>Shipping</b></p>
                                <span class="bill-item-price"><b id="shipping_fee">{{getCurrencySymbol('INR')}}0</b></span>
                            </div>
                            <div class="bill-item">
                                <p class="bill-item-name"><b>Total Amount</b></p>
                                <span class="bill-item-price"><b id="total_amount" data-id="{{getMainCartTotal()}}">{{getCurrencySymbol('INR')}}{{getMainCartTotal()}}</b></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-details style2">
                    <h3 class="checkout-box-title">Payment Method</h3>
                    <div class="bill-details">
                        <div class="select-payment-method mt-20">
                            <div>
                                <input type="radio" id="test1" class="paymentMethod" value="cod" name="radio-group">
                                <label for="test1">Cash On Delivery</label>
                            </div>
                            <div>
                                <input type="radio" id="test2" class="paymentMethod" value="rzpay" name="radio-group">
                                <label for="test2">Pay With RazorPay</label>
                            </div>
                        </div>
                        <div class="checkout-footer">
                            <form action="" id="checkOutForm">
                                <input type="hidden" name="shipping_method_id" value="" id="shipping_method_id">
                                <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">
                                <input type="hidden" name="payment_method_id" value="" id="payment_method_id">
                            </form>
                            <button type="button" id="submitCheckoutForm">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout section end -->

</div>
<!-- Content Wrapper End -->
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('input[type="radio"][name="address"]').change(function() {
        $('.card').removeClass('selected-address');
        $(this).closest('.card').addClass('selected-address');
    });
    $('input[type="radio"]').prop('checked', false);
    $('#shipping_method_id').val("");
    $('#shipping_address_id').val("");

    $('.shipping_method').on('click', function(){
            let shippingFee = $(this).attr('data-id');
            let currentTotalAmount = $('#total_amount').attr('data-id');
            // Convert to integers
            let shippingFeeInt = parseInt(shippingFee);
            let currentTotalAmountInt = parseInt(currentTotalAmount);
            let totalAmount = shippingFeeInt+currentTotalAmountInt;

            $('#shipping_method_id').val($(this).val());
            $('#shipping_fee').text("₹"+shippingFee);

            $('#total_amount').text("₹"+totalAmount)
    });

    $('.shipping_address').on('click', function(){
            $('#shipping_address_id').val($(this).data('id'));
    });

    $('.paymentMethod').on('click', function(){
        let payMethod = $(this).val();
        $('#payment_method_id').val(payMethod);
    });   


    $('#submitCheckoutForm').on('click', function(e){
        e.preventDefault();
        if($('#shipping_method_id').val() == ""){
            showToast('error',"Shipping method is requred");
        }else if ($('#shipping_address_id').val() == ""){
            showToast('error',"Shipping address is requred");
        }else if($('#payment_method_id').val() == ""){
            showToast('error',"Select the Payment Method");
        }else{
            let Paymethod = $('#payment_method_id').val();
            if(Paymethod == 'cod'){
              var title = "Confirm Cash On Delivery Order";
            }else{
              var title = "Proceed To Pay with Razor Pay";
            }
            Swal.fire({
                    title: title,
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm Order'
                    }).then((result) => {
                       if(result.isConfirmed){
                       
                    $.ajax({
                    url: "{{route('user.checkout.form-submit')}}",
                    method: 'POST',
                    data: $('#checkOutForm').serialize(),
                    success: function(data){
                        console.log(data);
                        if(data.status === 'success'){
                             window.location.href = data.redirect_url;
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                })

                       }
                    });    
        } 
        
    });    

    
});
</script>        
@endpush