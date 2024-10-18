@extends('frontend.layouts.app')
<div class="row">
        <div class="col-xl-12 m-auto">
            <div class="wsus__payment_area">
                @php
                    $razorpaySetting = \App\Models\RazorpaySetting::first();
                    $total = getFinalPayableAmount();
                
                @endphp
<form id="rzrpayment" action="" method="POST" style="display: none">
    @csrf
    <script src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="{{$razorpaySetting->razorpay_key}}"
        data-amount="{{$total * 100}}"
        data-buttontext="Pay With Razorpay"
        data-name="payment"
        data-description="Payment for product"
        data-prefill.name="{{Auth::user()->name}}"
        data-prefill.email="{{Auth::user()->email}}"
        data-theme.color="#ff7529">
    </script>
</form>

<script>
    window.onload = function() {
        var options = {
            "key": "{{$razorpaySetting->razorpay_key}}",
            "amount": "{{$total * 100}}", // Amount is in the smallest currency unit
            "currency": "INR",
            "name": "Payment",
            "description": "Payment for product",
            "prefill": {
                "name": "{{Auth::user()->name}}",
                "email": "{{Auth::user()->email}}"
            },
            "theme": {
                "color": "#ff7529"
            },
            "handler": function (response){
                // AJAX request to save payment success
                $.ajax({
                    url: "{{ route('user.razorpay.payment') }}", // The route for your success controller method
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        paymentMethod: "Razorpay",
                        paymentStatus: 0,
                        transactionId: response.razorpay_payment_id,
                        amount: {{$total}},
                        currency: "INR"
                    },
                    success: function (result) {
                        console.log(result);
                        // Redirect to success page or show success message
                        window.location.href = "{{ route('user.payment.success') }}";

                    },
                    error: function (err) {
                        // Handle the error
                        alert('Payment could not be processed.');
                        window.location.href = "{{ route('user.checkout') }}";
                    }
                });
            },
            "modal": {
                "ondismiss": function(){
                    // Redirect to the checkout page if the payment popup is closed
                   window.location.href = "{{ route('user.checkout') }}";
                }
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    };
</script>


            </div>
        </div>
    </div>