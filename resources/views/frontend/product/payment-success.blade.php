@extends('frontend.layouts.app')
@section('content')
<!-- Content Wrapper Start -->
<div class="content-wrapper error">

<!-- Error  Section start -->
<div class="error-wrap ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
            <div class="container success-container">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1 class="success-message">Payment Successful!</h1>
        <p class="order-details">
            Thank you for your purchase. <br>
            We have sent an order confirmation email to <strong>{{Auth::user()->email}}</strong>.
        </p>
        <div class="option-item">
            <a href="{{route('getProducts')}}" class="btn style1">Continue Shopping</a>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>
<!-- Error  Section end -->

</div>
<!-- Content Wrapper End -->
@endsection