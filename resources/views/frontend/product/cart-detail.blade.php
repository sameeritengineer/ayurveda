@extends('frontend.layouts.app')
@section('content')
<!-- Content Wrapper Start -->
<div class="content-wrapper">

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap bg-f br-3">
    <div class="container">
        <div class="breadcrumb-title">
            <h2>Cart</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a href="{{route('homepage')}}">Home </a></li>
                <li>Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

 <!-- Cart section start -->
 <div class="cart-wrap ptb-100">
    <div class="container">
        <div class="row gx-5">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-table ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>
                                            <div class="product-img">
                                                {{$item->thumb_image}}
                                                <img src="{{asset($item->options->image)}}" alt="Image">
                                            </div>
                                        </td>
                                        <td>
                                            <a class="cart-item" href="{{route('product-detail',['slug' => $item->options->slug])}}">
                                                <span>{{$item->name}}</span>
                                            </a>
                                        </td>
                                        <td>
                                            <p class="cart-item-price">{{getCurrencySymbol('INR')}}{{$item->price}}</p>
                                        </td>
                                        <td>
                                            <div class="cart-qty">
                                                <div class="product-quantity">
                                                    <div class="qtySelector">
                                                        <span class="decreaseQty">
                                                            <i class="ri-subtract-line"></i>
                                                        </span>
                                                        <input type="text" data-rowid="{{$item->rowId}}" class="qtyValue" value="{{$item->qty}}" readonly />
                                                        <span class="increaseQty">
                                                            <i class="ri-add-line"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p id="{{$item->rowId}}" class="cart-item-price">{{getCurrencySymbol('INR')}}{{$item->price * $item->qty}}</p>
                                        </td>
                                        <td>
                                        <a href="{{route('cart.remove-product', $item->rowId)}}"><i class="ri-delete-bin-6-line"></i></a>
                                            <!-- <button class="cart-action" type="button">
                                                <i class="ri-delete-bin-6-line"></i>
                                            </button> -->
                                        </td>
                                    </tr>
                                @endforeach   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-8 mb-25">
                        <div class="coupon-code">
                        <form id="coupon_form">
                            <input type="text" placeholder="Coupon Code" name="coupon_code" value="{{session()->has('coupon') ? session()->get('coupon')['coupon_code'] : ''}}">
                            <button type="submit" class="common_btn">Apply Coupon</button>
                        </form>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-4 text-sm-end mb-25">
                        <button class="btn style1 clear_cart" type="button">Clear Cart</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                        <div class="cart-total">
                            <h3 class="cart-box-title">Cart Totals</h3>
                            <div class="cart-total-wrap">
                                <div class="cart-total-item">
                                    <p>Subtotal</p>
                                    <span id="sub_total">{{getCurrencySymbol('INR')}}{{getCartTotal()}}</span>
                                </div>
                                <div class="cart-total-item">
                                    <p>Discount</p>
                                    <span id="discount">{{getCurrencySymbol('INR')}}{{getCartDiscount()}}</span>
                                </div>
                                <div class="cart-total-item">
                                    <p><b>Total</b></p>
                                    <span><b id="cart_total">{{getCurrencySymbol('INR')}}{{getMainCartTotal()}}</b></span>
                                </div>
                            </div>
                            <a href="checkout.html" class="btn style1 d-block w-100">Proceed To Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart section end -->

</div>
<!-- Content Wrapper End -->
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // incriment product quantity
        $('.increaseQty').on('click', function(){
            let input = $(this).siblings('.qtyValue');
            let quantity = parseInt(input.val())
            let rowId = input.attr('data-rowid');
            $.ajax({
                url: "{{route('cart.update-quantity')}}",
                method: 'POST',
                data: {
                    rowId: rowId,
                    quantity: quantity
                },
                success: function(data){
                    if(data.status === 'success'){
                         let productId = '#'+rowId;
                         let totalAmount = "{{getCurrencySymbol('INR')}}"+data.product_total
                         $(productId).text(totalAmount)
                         renderCartSubTotal();
                         calculateCouponDescount();

                        showToast('success',data.message);
                    }else if (data.status === 'error'){
                        showToast('error', data.message);
                    }
                },
                error: function(data){

                }
            })
        });
        // decrement product quantity
        $('.decreaseQty').on('click', function(){
            let input = $(this).siblings('.qtyValue');
            let quantity = parseInt(input.val())
            let rowId = input.attr('data-rowid');
            $.ajax({
                url: "{{route('cart.update-quantity')}}",
                method: 'POST',
                data: {
                    rowId: rowId,
                    quantity: quantity
                },
                success: function(data){
                    if(data.status === 'success'){
                         let productId = '#'+rowId;
                         let totalAmount = "{{getCurrencySymbol('INR')}}"+data.product_total
                         $(productId).text(totalAmount)
                         renderCartSubTotal();
                         calculateCouponDescount();

                        showToast('success',data.message);
                    }else if (data.status === 'error'){
                        showToast('error', data.message);
                    }
                },
                error: function(data){

                }
            })
        });    
        // get subtotal of cart and put it on dom
        function renderCartSubTotal(){
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.product-total') }}",
                success: function(data) {
                    $('#sub_total').text("{{getCurrencySymbol('INR')}}"+data);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }
          // clear cart
          $('.clear_cart').on('click', function(e){
            e.preventDefault();
            Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will clear your cart!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, clear it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                      
                        $.ajax({
                            type: 'get',
                            url: "{{route('clear.cart')}}",
                            success: function(data){
                                if(data.status === 'success'){
                                    window.location.reload();
                                }
                            },
                            error: function(xhr, status, error){
                                console.log(error);
                            }
                        })
                       
                    }
                })
        });
        // applay coupon on cart

        $('#coupon_form').on('submit', function(e){
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                method: 'GET',
                url: "{{ route('apply-coupon') }}",
                data: formData,
                success: function(data) {
                   if(data.status === 'error'){
                    showToast('error',data.message);
                   }else if (data.status === 'success'){
                    calculateCouponDescount()
                    showToast('success',data.message);
                   }
                },
                error: function(data) {
                    console.log(data);
                }
            })

        });
        // calculate discount amount
        function calculateCouponDescount(){
            $.ajax({
                method: 'GET',
                url: "{{ route('coupon-calculation') }}",
                success: function(data) {
                    if(data.status === 'success'){
                        $('#discount').text("{{getCurrencySymbol('INR')}}"+data.discount);
                        $('#cart_total').text("{{getCurrencySymbol('INR')}}"+data.cart_total);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }    
    });
</script>    
@endpush