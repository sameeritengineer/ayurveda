@extends('frontend.layouts.app')
@section('content')
            <!-- Hero Section Start -->
            @include('frontend.layouts.hero')
            <!-- Hero Section End --> 
            <!-- Product Category Section Start -->
            <section class="product-cat-wrap ptb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-7">
                            <div class="section-title style1  mb-40">
                                <span><img src="{{ asset('front/assets/img/section-img1.png') }}" alt="Image">We Serve Authenticity</span>
                                <h2>Unveiling the Natural Power of
                                Mleyered Ayurvedic Hair Care</h2>
                            </div>
                        </div>
                    </div>
                    <div class="product-cat-slider owl-carousel">
                        @php
                         $i = 1;
                        @endphp
                        @foreach($home_section1 as $section)
                        <div class="product-cat-card style1">
                            <span class="count-num">{{$i}}</span>
                            <div class="product-cat-icon">
                            {!! $section->icon !!}
                            </div>
                            <div class="product-cat-info">
                                <h3><a href="shop-details.html">{{$section->title}}</a></h3>
                                <p>{{$section->text}}</p>
                            </div>
                        </div>
                        @php $i++; @endphp
                        @endforeach


                    </div>
                </div>
            </section>
            <!-- Product Section End -->
            
            <!-- About Section Start -->
            <section class="about-wrap style1 bg-albastor ptb-100">
                <img src="{{ asset('front/assets/img/about/about-shape-1.png') }}" alt="Image" class="about-shape-one moveVertical sm-none">
                <img src="{{ asset('front/assets/img/about/about-shape-2.png') }}" alt="Image" class="about-shape-two waving_left sm-none">
                <div class="container">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="about-img-wrap">
                                <img src="{{ asset($home_section2->image ?? '') }}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                            <div class="about-content">
                                <div class="content-title style1">
                                    <span><img src="{{ asset('front/assets/img/section-img1.png') }}" alt="Image">{{$home_section2->heading}}</span>
                                    <h2>{{$home_section2->title}}</h2>
                                    {!! $home_section2->text !!}
                                </div>
                                <a href="about.html" class="cstylebtn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Sectin End -->
            
            <!-- Product Section Start -->
            <section class="product-wrap ptb-100 bg-green">
                <!-- <img src="{{ asset('front/assets/img/shape-7.png') }}" alt="Image" class="shape-one"> -->
                <div class="container">
                    <div class="section-title style2 text-center mb-40">
                        <!-- <span><img src="{{ asset('front/assets/img/section-img1.png') }}" alt="Image">Online Store</span> -->
                        <h2>Our Popular Products</h2>
                    </div>
                    <!-- <ul class="product-filter list-style">
                        <li><a data-filter="" class="filter-active">All</a></li>
                        <li><a data-filter=".cannabis">Cannabis</a></li>
                        <li><a data-filter=".cbd-oil">CBD Oil</a></li>
                        <li><a data-filter=".edibles">Edibles</a></li>
                        <li><a data-filter=".flowers">Flowers</a></li>
                    </ul> -->
                </div>
                <div class="swiper product-item-slider">
                    <div class="swiper-wrapper">
                       @foreach($products as $product)
                        <div class="swiper-slide Flowers edibles">
                            <div class="product-card style7">
                                <div class="product-img">
                                    <img src="{{ asset('front/assets/img/product/product-30.jpg') }}" alt="Image"> 
                                    <ul class="product-meta-option">
                                        <li><a href="{{route('product-detail',['slug' => $product->slug])}}"><i class="ri-eye-line"></i></a></li>
                                        <li>
                                        <form class="shopping-cart-form">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input class="" name="qty" type="hidden" min="1" max="100" value="1">
                                  <button class="btn style2 add-cart" type="submit">Add To Cart</button>
                                </form>
                                            <a class="homeAddCart"><i class="ri-shopping-cart-line"></i></a></li>
                                        <!-- <li><a href="wishlist.html"><i class="ri-heart-line"></i></a></li> -->
                                    </ul>
                                </div>
                        <div class="product-info">
                            <h3><a href="shop-details.html">{{$product->name}}</a></h3>
                            @if(checkDiscount($product))
                            <p class="price">{{getCurrencySymbol('INR')}}{{$product->offer_price}}<span class="discount">{{getCurrencySymbol('INR')}}{{$product->price}}</span></p>
                            @else
                            <p class="price">{{getCurrencySymbol('INR')}}{{$product->price}}</p>
                            @endif
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                    <div class="product-filter-pagination"></div>
                </div>
            </section>
            <!-- Product Section End -->

            <!-- Product Offser Section Start -->
            <section class="offer-wrap ptb-100">
                <img src="{{ asset('front/assets/img/shape-8.png') }}" alt="Image" class="offer-shape-one moveVertical sm-none">
                <img src="{{ asset('front/assets/img/shape-9.png') }}" alt="Image" class="offer-shape-two animationFramesTwo">
                <div class="container">
                    <img src="{{ asset('front/assets/img/shape-10.png') }}" alt="Image" class="offer-shape-three sm-none">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6 order-lg-1 order-md-2 order-2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="offer-content">
                                <div class="content-title style1">
                                    <!-- <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">Best Offer</span> -->
                                    <h3>{{$home_section3->title}}</h3>
                                    {!! $home_section3->text !!}
                                </div>
                                <!-- <div class="countdown-deals text-center" data-countdown="2024/12/11"></div> -->
                                <a href="shop-right-sidebar.html" class="cstylebtn">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-md-1 order-1" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                            <div class="offer-pproduct-slider owl-carousel">
                                <div class="product-slide-item">
                                    <!-- <div class="discout">
                                        <span>15%</span> Off
                                    </div>
                                    <span class="product-offer-price">$130</span> -->
                                    <img src="{{ asset($home_section3->image ?? '') }}" alt="Image">
                                </div>
                                <!-- <div class="product-slide-item">
                                    <div class="discout">
                                        <span>10%</span> Off
                                    </div>
                                    <span class="product-offer-price">$110</span>
                                    <img src="{{ asset('front/assets/img/product/offer-slider-2.jpg') }}" alt="Image">
                                </div>
                                <div class="product-slide-item">
                                    <div class="discout">
                                        <span>25%</span> Off
                                    </div>
                                    <span class="product-offer-price">$89</span>
                                    <img src="{{ asset('front/assets/img/product/offer-slider-3.jpg') }}" alt="Image">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Product Offser Section End -->

            <!-- Service Section Start -->
            <section class="service-wrap style1 pt-100 pb-75 bg-albastor">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                            <div class="section-title style1 text-center mb-40">
                                <span><img src="{{ asset('front/assets/img/section-img1.png') }}" alt="Image">Our Services</span>
                                <h2>Benefits Of Mleyered Ayurvedic Hair Oil</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            @foreach($home_section4_1 as $section4_1)
                            <div class="service-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                                <div class="service-icon">
                                   {!! $section4_1->icon !!}
                                </div>
                                <div class="service-info">
                                    <h3><a href="#">{{$section4_1->title}}</a></h3>
                                    <p>{{$section4_1->text}}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="col-lg-4">
                            <div class="service-img-wrap" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                                <img src="{{ asset('front/assets/img/service/service-img-1.jpg') }}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-4">
                        @foreach($home_section4_2 as $section4_2)
                            <div class="service-card style1" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                                <div class="service-icon">
                                {!! $section4_2->icon !!}
                                </div>
                                <div class="service-info">
                                    <h3><a href="#">{{$section4_2->title}}</a></h3>
                                    <p>{{$section4_2->text}}</p>
                                </div>
                            </div>
                        @endforeach       
                        </div>
                    </div>
                </div>
            </section>
            <!-- Service Section End -->

            <!-- CTA  Section Start -->
            <div class="cta-wrap pt-100 pb-75">
                <div class="cta-shape">
                    <img src="{{ asset('front/assets/img/counter-shape-1.png') }}" alt="Image">
                </div>
                <div class="container">
                    <!-- <div class="counter-card-wrap  pb-75">
                        <div class="counter-card">
                            <div class="counter-text">
                                <div class="counter-num">
                                    <span class="odometer" data-count="37"></span>
                                </div>
                                <p>Awarded Licenses In Fourteen Atates </p>
                            </div>
                        </div>
                        <div class="counter-card">
                            <div class="counter-text">
                                <div class="counter-num">
                                    <span class="odometer" data-count="768"></span>
                                </div>
                                <p>Cultivation Space Have been Built</p>
                            </div>
                        </div>
                        <div class="counter-card">
                            <div class="counter-text">
                                <div class="counter-num">
                                    <span class="odometer" data-count="68"></span>
                                </div>
                                <p>Tons On Sale Product Available</p>
                            </div>
                        </div>
                        <div class="counter-card">
                            <div class="counter-text">
                                <div class="counter-num">
                                    <span class="odometer" data-count="2389"></span>
                                </div>
                                <p>Percent Growth In The Last Tow Years</p>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-lg-6 order-lg-1 order-md-2 order-2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="apply-form">
                                <div class="content-title style1">
                                    <h2>Apply For Consultation</h2>
                                    <p>On the other hand, we denounce with righteous indignation and
                                    dislike men who are so beguiled and demoralized by the charms.</p>
                                </div>
                                <form method="post" class="form-wrap" id="contactForm">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="Name*" id="name"
                                                        required data-error="Please enter your name">
                                                    <input type="hidden" id="posturl" name="posturl" value="{{route('postcontact')}}" />    
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" required
                                                        placeholder="Email*" data-error="Please enter your email">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="phone_number" id="phone_number" required
                                                        placeholder="Phone*" data-error="Please enter your phone">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="msg_subject" placeholder="Subject*" id="msg_subject" required data-error="Please enter your subject">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group v1">
                                                    <textarea name="message" id="message" placeholder="Your Messages.." cols="30" rows="10" required data-error="Please enter your message"></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="form-check checkbox">
                                                        <input
                                                            name="gridCheck"
                                                            value="I agree to the terms and privacy policy."
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            id="gridCheck"
                                                            required
                                                        >
                                                        <label class="form-check-label" for="gridCheck">
                                                            I agree to the <a class="link style1" href="terms-of-service.html">Terms &amp; Conditions</a> and <a class="link style1" href="privacy-policy.html">Privacy Policy</a>
                                                        </label>
                                                        <div class="help-block with-errors gridCheck-error"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" name="submit" class="contact-btn style1 w-block w-100">Send Message</button>
                                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-md-1 order-1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="video-wrap bg-f video-bg-1">
                                <a class="play-now" data-fslightbox href="https://www.youtube.com/watch?v=N7--BsL6cyA">
                                    <i class="ri-play-fill"></i>
                                    <span class="ripple"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-100 justify-content-center">
                    @foreach($home_section5 as $section5)    
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="promo-card style1">
                                <div class="promo-title">
                                    <span class="promo-icon">
                                    {!! $section5->icon !!}
                                    </span>
                                    <h3>{{$section5->title}}</h3>
                                </div>
                                <p>{{$section5->text}}</p>
                            </div>
                        </div>
                    @endforeach   

                    </div>
                </div>
            </div>
            <!-- CTA Section End -->

            <!-- Feature Section Start -->
            <section class="feature-wrap style1 pb-100">
                <img src="{{ asset('front/assets/img/about/feature-shape-1.png') }}" alt="Image" class="feature-shape-one">
                <img src="{{ asset('front/assets/img/about/feature-shape-2.png') }}" alt="Image" class="feature-shape-two">
                <div class="container">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="feature-img-wrap">
                                <img src="{{ asset($home_section6->image ?? '') }}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-content">
                                <div class="content-title style1">
                                    <span><img src="{{ asset('front/assets/img/section-img1.png') }}" alt="Image">{{$home_section6->heading}}</span>
                                    <h2>{{$home_section6->title}}</h2>
                                    {!! $home_section6->text !!}
                                </div>
                                <a href="#" class="btn cstylebtn mt-30">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Feature Sectin End -->

            <!-- Newsletter Section Start -->
            <section class="newsletter-wrap ptb-100">
                <img src="{{ asset('front/assets/img/newsletter-shape-1.png') }}" alt="Image" class="newsletter-shape-one">
                <img src="{{ asset('front/assets/img/newsletter-shape-2.png') }}" alt="Image" class="newsletter-shape-two moveHorizontal">
                <img src="{{ asset('front/assets/img/newsletter-shape-3.png') }}" alt="Image" class="newsletter-shape-three animationFramesTwo">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="content-title style2">
                                <span><img src="{{ asset('front/assets/img/section-img1.png') }}" alt="Image">Newsletter</span>
                                <h2>Subscribe To Newsletter</h2>
                                <p>Stay in the Loop! Subscribe to our newsletter for the latest
                                updates, exclusive offers, and tips delivered straight to your inbox.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form class="newsletter-form" id="newsletter-form-sub">
                                <input id="news_email" type="email" name="email" placeholder="Enter Your Email Address" required>
                                <button type="submit">Subscribe Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Newsletter Section End -->

             <!-- Testimonial Section Start -->
             <section class="testimonial-wrap ptb-100 bg-albastor">
                <div class="container">
                    <div class="section-title style1 text-center mb-40">
                        <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">Customer Reviews</span>
                        <h2>What Our Customer Say About Us</h2>
                    </div>
                    <div class="testimonial-slider-one owl-carousel">
                        @foreach($testimonials as $test)
                        <div class="testimonial-card style3">
                            <p class="client-quote">{!! $test->description !!}</p>
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{ asset($test->image) }}" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3>{{$test->name}}</h3>
                                        <span>{{$test->designation}}</span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-right-quote-sign"></i>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>  
            <!-- Testimonial Section End -->

            <!-- Blog Section Start -->
            <section class="blog-wrap pt-100 pb-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                            <div class="section-title style1 text-center mb-40">
                                <span><img src="{{ asset('front/assets/img/section-img1.png') }}" alt="Image">Our blog</span>
                                <h2>Latest News &amp; Articles</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @foreach($blogs as $blog)
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="blog-card style1">
                                <div class="blog-img">
                                    <img src="{{ asset($blog->image) }}" alt="Image">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="{{route('single-blog',['slug'=> $blog->slug])}}">{{$blog->name}}</a></h3>
                                    <p>{!!truncateTo100Words($blog->description)!!}</p>
                                    <a href="{{route('single-blog',['slug'=> $blog->slug])}}" class="link style1">Read More</a>
                                </div>
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-calendar-2-line"></i><a href="posts-by-date.html">{{$blog->created_at}}</a></li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- Blog Section End -->
@endsection
@push('scripts')
<script>
$(document).ready(function(){ 
    $(document).on('submit', '#newsletter-form-sub', function(e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
                method: 'POST',
                data: formData,
                url: "{{ route('newsletter') }}",
                success: function(data) {
                    if(data.status === 'success'){
                        showToast('success',data.message);
                        $("#newsletter-form-sub")[0].reset();
                    }else if (data.status === 'exists'){
                        showToast('error', data.message);
                    }else{
                        showToast('error', 'Something Went Wrong');
                    }
                },
                error: function(data) {

                }
            });
    });    
});
</script>
@endpush