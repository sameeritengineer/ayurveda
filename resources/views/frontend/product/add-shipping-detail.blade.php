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
        <h3 class="checkout-box-title">Shipping Details</h3>
        @foreach($addresses as $address)    
        <div class="col-md-4">
    <div class="card mb-3">
        <div class="card-body">
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" data-id="{{$address->id}}" name="address" id="address{{$address->id}}">
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

        <form action="#" class="checkout-form">
            <h3 class="checkout-box-title">Billing Details</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="select_country">Country</label>
                        <select name="select_country" id="select_country">
                            <option>Country</option>
                            <option value="1">United States</option>
                            <option value="1">Germany</option>
                            <option value="1">Russia</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" required>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname"required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" id="company_name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="lname">Address</label>
                        <input type="text" name="address" id="address"required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="select_country3">City</label>
                        <select name="select_country3" id="select_country3">
                            <option>City</option>
                            <option value="1">New York</option>
                            <option value="1">Florida</option>
                            <option value="1">Los Angels</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="select_country2">State</label>
                        <select name="select_country2" id="select_country2">
                            <option>State</option>
                            <option value="1">New York</option>
                            <option value="1">Florida</option>
                            <option value="1">Los Angels</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="zip">ZIP Code</label>
                        <input type="text" name="zip" id="zip" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="street">Street</label>
                        <input type="text" name="street" id="street">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="number" name="phone" id="phone"  required >
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="msg">Order Note</label>
                        <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Order Note"
                            ></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="checkbox">
                        <input type="checkbox" id="test_10">
                        <label for="test_10">I have read And Accept the <a class="link style1" href="terms-of-service.html"> Terms &amp; Conditions</a></label>
                    </div>
                </div>
                <div class="col-lg-12 mt-25">
                    <div class="form-group mb-0">
                        <button type="button" class="btn style2 w-100 d-block">Save Information</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row gx-5">
            <div class="col-lg-6">
                <div class="checkout-details">
                    <h3 class="checkout-box-title">Checkout Summary</h3>
                    <div class="bill-details">
                        <div class="bill-item-wrap">
                            <div class="bill-item-title">
                                <p class="bill-item-name"><b>Product Name</b></p>
                                <span class="bill-item-price"><b>Total</b></span>
                            </div>
                            <div class="bill-item">
                                <p class="bill-item-name">CBD Serum</p>
                                <span class="bill-item-price">$100.00</span>
                            </div>
                            <div class="bill-item">
                                <p class="bill-item-name">Guchi Facewash</p>
                                <span class="bill-item-price">$240.00</span>
                            </div>
                            <div class="bill-item">
                                <p class="bill-item-name">Naga Seed</p>
                                <span class="bill-item-price">$20.00</span>
                            </div>
                            <div class="bill-item-footer">
                                <p class="bill-item-name"><b>Cart Subtotal</b></p>
                                <span class="bill-item-price"><b>$360.00</b></span>
                            </div>
                            <div class="bill-item">
                                <p class="bill-item-name"><b>Shipping</b></p>
                                <span class="bill-item-price"><b>$0.00</b></span>
                            </div>
                            <div class="bill-item">
                                <p class="bill-item-name"><b>Total Amount</b></p>
                                <span class="bill-item-price"><b>$360.00</b></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="checkout-details style2">
                    <h3 class="checkout-box-title">Payment Method</h3>
                    <div class="bill-details">
                        <div class="select-payment-method mt-20">
                            <div>
                                <input type="radio" id="test1" name="radio-group">
                                <label for="test1">Direct Bank Transfer</label>
                                <p>Lorem ipsum dolor sit amet consectetur adipi consec sicing elit similique veniam.</p>
                            </div>
                            <div>
                                <input type="radio" id="test3" name="radio-group">
                                <label for="test3">Check Payment</label>
                            </div>
                            <div>
                                <input type="radio" id="test2" name="radio-group">
                                <label for="test2">Cash On Delivery</label>
                            </div>
                        </div>
                        <div class="checkout-footer">
                            <button type="button" class="btn style1 d-block w-100 mt-10">Place Order</button>
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
        });
</script>        
@endpush