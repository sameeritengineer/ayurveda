@extends('frontend.layouts.app')
@section('content')
<!-- Content Wrapper Start -->
<div class="content-wrapper">

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap bg-f br-1">
    <div class="container">
        <div class="breadcrumb-title">
            <h2>Products Details</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a href="{{route('homepage')}}">Home </a></li>
                <li><a href="{{route('getProducts')}}">Shop</a></li>
                <li>Products Details</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details section start -->
<section class="product-details-wrap pt-100">
    <div class="container">
        <div class="row gx-5 ">
            <div class="col-lg-6">
                <div class="single-product-gallery">
                    <div class="swiper-container single-product-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide single-product-item">
                                <img src="{{asset($product->thumb_image)}}" />
                            </div>
                            @foreach ($product->productImageGalleries as $productImage)
                            <div class="swiper-slide single-product-item">
                                <img src="{{asset($productImage->image)}}" />
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="swiper-button-next"><i class="ri-arrow-right-s-line"></i></div>
                        <div class="swiper-button-prev"><i class="ri-arrow-left-s-line"></i></div>
                    </div>
                    <div thumbsSlider="" class="swiper-container single-product-thumbs">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide single-product-thumb bg-albastor">
                                <img src="{{asset($product->thumb_image)}}" />
                            </div>
                            @foreach ($product->productImageGalleries as $productImage)
                            <div class="swiper-slide single-product-thumb bg-albastor">
                                <img src="{{asset($productImage->image)}}" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-product-details">
                    <div class="single-product-title">
                        <h2>{{$product->name}}</h2>
                        <!-- <h3><span>$350</span> <span class="discount">$450</span></h3> -->
                        @if(checkDiscount($product))
                        <h3><span>{{getCurrencySymbol('INR')}}{{$product->offer_price}}</span> <span class="discount">{{getCurrencySymbol('INR')}}{{$product->price}}</span></h3>
                        @else
                        <h3><span>{{getCurrencySymbol('INR')}}{{$product->price}}</span></h3>
                        @endif
                        <div class="ratings">
                            <ul class="list-style">
                            @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $product->reviews_avg_rating)
                                    <li><i class="ri-star-fill"></i></li>
                                    @else
                                    <li><i class="ri-star-line"></i></li>
                                    @endif
                                    @endfor
                            </ul>
                            <span>({{count($product->reviews)}} customer review)</span>
                        </div>
                    </div>
                    <p class="single-product-desc">
                        {{$product->short_description}}
                    </p>
                    <div class="product-more-option">
                        <div class="product-more-option-item">
                            <h5>Category :</h5>
                            <a href="#">{{$product->category->cat_name}}</a>
                        </div>
                        <!-- <div class="product-more-option-item">
                            <h5>Product Capacity :</h5>
                            <span>50 ml</span>
                        </div> -->
                        <div class="product-more-option-item">
                            <h5>Product Code :</h5>
                            <span>{{$product->sku}}</span>
                        </div>
                        <div class="product-more-option-item">
                            <h5>Availability :</h5>
                            @if ($product->qty > 0)
                            <span>in stock</span> ({{$product->qty}} item)
                            @elseif ($product->qty === 0)
                            <span>stock out</span> ({{$product->qty}} item)
                            @endif
                        </div>
                        <!-- <div class="product-more-option-item">
                            <h5>Tag :</h5>
                            <a href="shop-left-sidebar.html">Medicine</a>,<a href="shop-left-sidebar.html">Health</a>
                        </div> -->
                    </div>
                    <form class="shopping-cart-form">
                    <div class="product-more-option-item">
                        <div class="product-quantity">
                            <div class="qtySelector">
                                <span class="decreaseQty">
                                    <i class="ri-subtract-line"></i>
                                </span>
                                <input type="text" class="qtyValue" name="qty" value="1" />
                                <span class="increaseQty">
                                    <i class="ri-add-line"></i>
                                </span>
                            </div>
                        </div>
                        <!-- <a href="cart.html" class="btn style1 add-to-cart">Add To Cart</a> -->
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button class="btn style2 add-cart" type="submit">Add To Cart</button>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
        <div class="row ptb-100">
            <div class="col-lg-12">
                <ul class="nav nav-tabs product-tablist" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_1"
                            type="button" role="tab">Description</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_2"
                            type="button" role="tab">Ingredients</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link " data-bs-toggle="tab" data-bs-target="#tab_5" type="button"
                            role="tab">Benefits</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link " data-bs-toggle="tab" data-bs-target="#tab_4" type="button"
                            role="tab">How To Use</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link " data-bs-toggle="tab" data-bs-target="#tab_3" type="button"
                            role="tab">Reviews</button>
                    </li>
                </ul>
                <div class="tab-content product-tab-content">
                    <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                        <div class="product_desc">
                           {!! $product->long_description !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_2" role="tabpanel">
                        <div class="product_desc">
                           {!! $product->ingredient !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_3" role="tabpanel">

                        <div>
                                    <div class="wsus__pro_det_review">
                                        <div class="wsus__pro_det_review_single">
                                            <div class="row">
                                                <div class="col-xl-7 col-lg-7">
                                                    <div class="wsus__comment_area">
                                                        <h4>Reviews <span>{{count($reviews)}}</span></h4>
                                                        @foreach ($reviews as $review)
                                                        <div class="wsus__main_comment">
                                                            <div class="wsus__comment_img">
                                                                <img src="{{asset($review->user->image)}}" alt="user"
                                                                    class="img-fluid w-100">
                                                            </div>
                                                            <div class="wsus__comment_text reply">
                                                                <h6>{{$review->user->name}} <span>{{$review->rating}} <i
                                                                            class="fas fa-star"></i></span></h6>
                                                                <span>{{date('d M Y', strtotime($review->created_at))}}</span>
                                                                <p>{{$review->review}}
                                                                </p>
                                                                <ul class="">
                                                                    @if (count($review->productReviewGalleries) > 0)

                                                                    @foreach ($review->productReviewGalleries as $image)

                                                                    <li><img src="{{asset($image->image)}}" alt="product"
                                                                            class="img-fluid "></li>
                                                                    @endforeach
                                                                    @endif

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        @endforeach

                                                        <div class="mt-5">
                                                            @if ($reviews->hasPages())
                                                                {{$reviews->links()}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5 col-lg-5 mt-4 mt-lg-0">
                                                    @auth
                                                    @php
                                                        $isBrought = false;
                                                        $orders = \App\Models\Order::where(['user_id' => auth()->user()->id, 'order_status' => 'delivered'])->get();
                                                        foreach ($orders as $key => $order) {
                                                           $existItem = $order->orderProducts()->where('product_id', $product->id)->first();

                                                           if($existItem){
                                                            $isBrought = true;
                                                           }
                                                        }

                                                    @endphp

                                                    @if ($isBrought === true)
                                                    <div class="wsus__post_comment rev_mar" id="sticky_sidebar3">
                                                        <h4>Share Your Review With Us</h4>
                                                        <form id="userReview" enctype="multipart/form-data" method="POST">
                                                            @csrf
                                                            <div class="row">

                                                                <div class="col-xl-12">
                                                                    <div class="wsus__single_com">
                                                                        <select name="rating" id="" class="form-control">
                                                                            <option value="">Select Rating</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-12">
                                                                    <div class="col-xl-12">
                                                                        <div class="wsus__single_com">
                                                                            <textarea cols="70" rows="4" name="review"
                                                                                placeholder="Write your review"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="img_upload">
                                                                <div class="">
                                                                    <input type="file" name="images[]" multiple>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="product_id" id="" value="{{$product->id}}">

                                                            <button class="common_btn btn style1 w-block w-100" type="submit">Submit
                                                            </button>
                                                        </form>
                                                    </div>
                                                    @endif
                                                    @endauth

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                       <!--  <div class="row gx-5">
                            <div class="col-lg-6">
                                <div class="client-review comment-item-wrap">
                                    <div class="comment-form-title">
                                        <h4>Product Review</h4>
                                    </div>
                                    @foreach($reviews as $review)
                                    <div class="comment-item">
                                        <div class="comment-author-img">
                                            <img src="{{ asset('front/assets/img/user/userdefault.jpeg')}}" alt="Image">
                                        </div>
                                        <div class="comment-author-wrap">
                                            <div class="comment-author-info">
                                                <div class="row align-items-start">
                                                    <div class="comment-author-name">
                                                        <h5>{{$review->user->name}}</h5>
                                                        <ul class="list-style rating">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $review->rating)
                                                        <li><i class="ri-star-fill"></i></li>
                                                        @else
                                                        <li><i class="ri-star-line"></i></li>
                                                        @endif
                                                        @endfor
                                                        </ul>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p>{{$review->review}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="page-nav list-style mt-10">
                                    @if ($reviews->hasPages())
                                    {{ $reviews->links('pagination::bootstrap-4') }}
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="client-review-form">
                                    <div class="comment-form-title">
                                        <h4>Write Your Comment</h4>
                                    </div>
                                    <form action="#" class="comment-form">
                                        <div class="row gx-3">
                                            <div class="col-lg-6">
                                                <div class="form-group s1">
                                                    <input type="text" placeholder="Your  Full Name*">
                                                </div>
                                                <div class="form-group s2">
                                                    <input type="email" placeholder="Email Address*">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <textarea name="review-msg" id="review-msg" cols="30" rows="10" placeholder="Your comments..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="test_1">
                                                    <label for="test_1">
                                                        I Agree with the <a class="link style1" href="terms-of-service.html">Terms &amp; conditions</a>
                                                    </label>
                                                </div>
                                                <button class="btn style1 mt-25">SUBMIT REVIEW</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="tab-pane fade  " id="tab_4" role="tabpanel">
                        <div class="product_desc">
                           {!! $product->how_to_use !!}
                        </div>
                    </div>
                    <div class="tab-pane fade  " id="tab_5" role="tabpanel">
                        <div class="product_desc">
                           {!! $product->benifits !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
<!-- Product Details section end -->

 <!-- Product Section Start -->
<section class="product-wrap pb-50">
    <div class="container ">
        <div class="row mb-40 align-items-center">
            <div class="col-md-8">
                <div class="section-title style1">
                    <span><img src="{{ asset('front/assets/img/section-img.png')}}" alt="Image">Our Shop</span>
                    <h2>Related Products</h2>
                </div>
            </div>
            <div class="col-md-4 text-md-end sm-none">
                <a href="{{route('getProducts')}}" class="btn style2">View All Products</a>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($relatedProducts as $data)
            <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="product-card style2">
                        <div class="product-img">
                            <img src="{{asset($data->thumb_image)}}" alt="Image">
                            <form class="shopping-cart-form">
                                <input type="hidden" name="product_id" value="{{$data->id}}">
                                <input class="" name="qty" type="hidden" min="1" max="100" value="1">
                                  <button class="btn style2 add-cart" type="submit">Add To Cart</button>
                                </form>
                        </div>
                        <div class="product-info">
                        <h3><a href="{{route('product-detail',['slug' => $data->slug])}}">{{$data->name}}</a></h3>
                        @if(checkDiscount($product))
                        <p class="price">{{getCurrencySymbol('INR')}}{{$data->offer_price}} <span class="discount">{{getCurrencySymbol('INR')}}{{$data->price}}</span></p>
                        @else
                        <p class="price">{{getCurrencySymbol('INR')}}{{$data->price}}</p>
                        @endif
                        </div>
                    </div>
            </div>
            @endforeach

     
        </div>
    </div>
</section>
<!-- Product Section End -->

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

        $('#userReview').on('submit', function(e){
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                method: 'POST',
                url: "{{route('user.review.create')}}",
                data: formData,
                success: function(data) {
                   if(data.status === 'error'){
                    showToast('error',data.message);
                   }else if (data.status === 'success'){
                    $("#userReview")[0].reset();
                    showToast('success',data.message);
                   }
                },
                error: function(data) {
                    console.log(data);
                }
            })

        });

 });       
</script>
@endpush
