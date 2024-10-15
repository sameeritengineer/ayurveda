@extends('frontend.layouts.app')
@section('content')
<!-- Content Wrapper Start -->
<div class="content-wrapper">

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap bg-f br-1">
    <div class="container">
        <div class="breadcrumb-title">
            <h2>Products</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a href="{{route('homepage')}}">Home </a></li>
                <li>Products</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

 <!-- Shop Start -->
 <div class="shop-wrap ptb-100">
    <div class="container">
        <div class="row gx-5">
            <div class="col-xl-4 col-lg-12 order-xl-1 order-lg-2 order-md-2 order-2">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <div class="search-box">
                        <form action="{{url()->current()}}">
                            <div class="form-group">
                                <input type="search" name="search" placeholder="Search">
                                <button type="submit"> 
                                    <i class="flaticon-search"></i>
                                </button>
                            </div>
                        </form>    
                        </div>
                    </div>
                    <div class="sidebar-widget categories">
                        <h4>Categories</h4>
                        <ul class="category-box list-style">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{route('getProducts', ['category' => $category->cat_slug])}}">
                                @if (request()->has('category') && request()->query('category') == $category->cat_slug) 
                                   <i class="ri-checkbox-line"></i>
                                @endif
                                    {{$category->cat_name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-widget range-slider">
                        <h4>Price Filter</h4>
                        <form action="{{url()->current()}}">
                        <div class="form-group">
                            <div id="slider-range" class="price-range mar-bot-20"></div>
                            <label for="price-range">Price:</label>
                            <input type="text" id="amount">
                            <input type="hidden" id="r_min_price" name="min_price" value="0" />
                            <input type="hidden" id="r_max_price" name="max_price" value="500" />
                            @if (request()->has('category'))
                            <input type="hidden" name="category" value=" {{request()->query('category')}}"/>
                            @endif
                            <button type="submit" class="btn style1">filter</button>
                        </div>
                        </form>
                    </div>
                    <!-- <div class="sidebar-widget tags">
                        <h4>Popular Tags </h4>
                        <div class="tag-list">
                            <ul class="list-style">
                                <li><a href="posts-by-tag.html">Health</a></li>
                                <li><a href="posts-by-tag.html">Medicine</a></li>
                                <li><a href="posts-by-tag.html">Cannbis</a></li>
                                <li><a href="posts-by-tag.html">Marijuanna</a></li>
                                <li><a href="posts-by-tag.html">Doctor</a></li>
                                <li><a href="posts-by-tag.html">Herbal</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="sidebar-widget new-product box">
                        <h4>Popular Products</h4>
                        <div class="new-product-wrap">
                            @foreach($top_products as $top)
                            <div class="new-product-item">
                                <div class="new-product-img">
                                    <img src="{{asset($top->thumb_image)}}" alt="Iamge">
                                </div>
                                <div class="new-product-info">
                                    <h6><a href="shop-details.html">{{$top->name}}</a></h6>
                                    <!-- <span>$128.00</span>
                                    <span class="discount">$140</span> -->
                            @if(checkDiscount($top))
                            <p class="price">{{getCurrencySymbol('INR')}}{{$top->offer_price}}<span class="discount">{{getCurrencySymbol('INR')}}{{$top->price}}</span></p>
                            @else
                            <p class="price">{{getCurrencySymbol('INR')}}{{$top->price}}</p>
                            @endif
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-12 order-xl-2 order-lg-1 order-md-1 order-1">
                <!-- <div class="product-filter-wrap">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="product-result">
                                <p>Showing 1-10 of 20 Results</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="filter-item-cat">
                                <select>
                                    <option value="1">Default Sorting</option>
                                    <option value="2">Sort By Most Popular</option>
                                    <option value="3">Sort By High To Low</option>
                                    <option value="4">Sort By Low To High</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row justify-content-center">
                    @foreach($products as $product)
                    <div class="col-xxl-4 col-xl-6 col-lg-4 col-md-6">
                        <div class="product-card style6">
                            <div class="product-img">
                                <img src="{{asset($product->thumb_image)}}" alt="Image">
                                <!-- <a href="cart.html" class="btn style2 add-cart">Add To Cart</a> -->
                                <form class="shopping-cart-form">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input class="" name="qty" type="hidden" min="1" max="100" value="1">
                                  <button class="btn style2 add-cart" type="submit">Add To Cart</button>
                                </form>    
                            </div>
                            <div class="product-info">
                            @if(checkDiscount($product))
                            <p class="price">{{getCurrencySymbol('INR')}}{{$product->offer_price}}<span class="discount">{{getCurrencySymbol('INR')}}{{$product->price}}</span></p>
                            @else
                            <p class="price">{{getCurrencySymbol('INR')}}{{$product->price}}</p>
                            @endif
                                
                                <h3><a href="{{route('product-detail',['slug' => $product->slug])}}">{{$product->name}}</a></h3>
                                <ul class="ratings list-style">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $product->reviews_avg_rating)
                                    <li><i class="ri-star-fill"></i></li>
                                    @else
                                    <li><i class="ri-star-line"></i></li>
                                    @endif
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

               </div>
               @if (count($products) === 0)
                    <div class="text-center mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h2>Product not found!</h2>
                            </div>
                        </div>
                    </div>
                @endif
               <div class="page-nav list-style mt-10">
               {{ $products->links('pagination::bootstrap-4') }}
               </div>
               
                <!-- <ul class="page-nav list-style mt-10">
                    <li><a href="shop-right-sidebar.html"><i class="ri-arrow-left-s-line"></i></a></li>
                    <li><a class="active" href="shop-right-sidebar.html">1</a></li>
                    <li><a href="shop-right-sidebar.html">2</a></li>
                    <li><a href="shop-right-sidebar.html">3</a></li>
                    <li><a href="shop-right-sidebar.html"><i class="ri-arrow-right-s-line"></i></a></li>
                </ul> -->
                
            </div>
        </div>
    </div>
</div>
<!-- Shop End -->

</div>
<!-- Content Wrapper End -->
<section class="testimonial-wrap ptb-100 bg-albastor">
                <div class="container">
                    <div class="container features-contact-us-container">
    <div class="row">
        <div class="col-md-3">
            <div class="feature text-center">
                <div class="icon-container">
                    <img loading="lazy" src="//avimeeherbal.com/cdn/shop/files/shipping-icon_1.png?v=1706782202" alt="Free Shipping Icon" class="img-fluid">
                </div>
                <div class="info-container">
                    <h3 class="title">Free Shipping on Purchase of Rs 299/-</h3>
                    <p class="subtitle">On All Domestic Orders</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="feature text-center">
                <div class="icon-container">
                    <img loading="lazy" src="//avimeeherbal.com/cdn/shop/files/support.png?v=1706782084" alt="Support Icon" class="img-fluid">
                </div>
                <div class="info-container">
                    <h3 class="title">WE SUPPORT</h3>
                    <p class="subtitle">6 Days 10 am to 6 pm</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="contact-us text-center">
                <h3 class="heading">Have Queries or Concerns?</h3>
                <button id="contactUs" class="btn btn-primary mt-3"><a href="{{route('contact')}}" class="text-white">Contact Us</a></button>
            </div>
        </div>
    </div>
</div>
                </div>
</section> 
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
                // Get the current URL
const urlParams = new URLSearchParams(window.location.search);

// Get specific query string parameters
const min_price = urlParams.get('min_price');
const max_price = urlParams.get('max_price');
if(min_price && min_price){
    $("#slider-range").slider({
        range: true,
        min: min_price,
        max: max_price,
        values: [min_price, max_price],
    });

$(" #amount").val("₹" + $("#slider-range").slider("values", 0) +
        " - " + "₹" + $("#slider-range").slider("values", 1));   
}

    });
    </script>
@endpush