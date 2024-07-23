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
                                <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">We're Top Sellers</span>
                                <h2>Check Our Medical Marijuana Products</h2>
                            </div>
                        </div>
                    </div>
                    <div class="product-cat-slider owl-carousel">
                        <div class="product-cat-card style1">
                            <span class="count-num">01</span>
                            <div class="product-cat-icon">
                            <i class="flaticon-cbd-oil"></i>
                            </div>
                            <div class="product-cat-info">
                                <h3><a href="shop-details.html">Fresh Cannabies</a></h3>
                                <p>There are many variaties of rem amet consec but the major have suffered alteration in some case. </p>
                            </div>
                        </div>
                        <div class="product-cat-card style1">
                            <span class="count-num">02</span>
                            <div class="product-cat-icon">
                                <i class="flaticon-capsule"></i>
                            </div>
                            <div class="product-cat-info">
                                <h3><a href="shop-details.html">Medical Pills</a></h3>
                                <p>There are many variaties of rem amet consec but the major have suffered alteration in some case. </p>
                            </div>
                        </div>
                        <div class="product-cat-card style1">
                            <span class="count-num">03</span>
                            <div class="product-cat-icon">
                                <i class="flaticon-handbook"></i>
                            </div>
                            <div class="product-cat-info">
                                <h3><a href="shop-details.html">Educational Materials</a></h3>
                                <p>There are many variaties of rem amet consec but the major have suffered alteration in some case. </p>
                            </div>
                        </div>
                        <div class="product-cat-card style1">
                            <span class="count-num">04</span>
                            <div class="product-cat-icon">
                            <i class="flaticon-herbal-1"></i>
                            </div>
                            <div class="product-cat-info">
                                <h3><a href="shop-details.html">Cannabies Infused</a></h3>
                                <p>There are many variaties of rem amet consec but the major have suffered alteration in some case. </p>
                            </div>
                        </div>
                        <div class="product-cat-card style1">
                            <span class="count-num">05</span>
                            <div class="product-cat-icon">
                            <i class="flaticon-herbal"></i>
                            </div>
                            <div class="product-cat-info">
                                <h3><a href="shop-details.html">CBD Cookies</a></h3>
                                <p>There are many variaties of rem amet consec but the major have suffered alteration in some case. </p>
                            </div>
                        </div>
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
                                <img src="{{ asset('front/assets/img/about/about-img-1.png') }}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                            <div class="about-content">
                                <div class="content-title style1">
                                    <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">About Our Dispensary</span>
                                    <h2>We Provide High Quality And Certified Products</h2>
                                    <h6>All the Lorem Ipsum generators on the Internet tend to repeat defined chunks making this the first true generator on Internet.</h6>
                                    <p>There are many variations of passages of Lorem Ipsum available, bhe mred aln ine form, by injected humour, or randomised words which don't look even slilievable. If youre going to use a passage of lorem.</p>
                                </div>
                                <a href="about.html" class="btn style1">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Sectin End -->
            
            <!-- Product Section Start -->
            <section class="product-wrap ptb-100 bg-green">
                <img src="{{ asset('front/assets/img/shape-7.png') }}" alt="Image" class="shape-one">
                <div class="container">
                    <div class="section-title style2 text-center mb-40">
                        <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">Online Store</span>
                        <h2>Muva Popular Products</h2>
                    </div>
                    <ul class="product-filter list-style">
                        <li><a data-filter="" class="filter-active">All</a></li>
                        <li><a data-filter=".cannabis">Cannabis</a></li>
                        <li><a data-filter=".cbd-oil">CBD Oil</a></li>
                        <li><a data-filter=".edibles">Edibles</a></li>
                        <li><a data-filter=".flowers">Flowers</a></li>
                    </ul>
                </div>
                <div class="swiper product-item-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide Flowers edibles">
                            <div class="product-card style7">
                                <div class="product-img">
                                    <img src="{{ asset('front/assets/img/product/product-30.jpg') }}" alt="Image">
                                    <ul class="product-meta-option">
                                        <li><a href="shop-details.html"><i class="ri-eye-line"></i></a></li>
                                        <li><a href="cart.html"><i class="ri-shopping-cart-line"></i></a></li>
                                        <li><a href="wishlist.html"><i class="ri-heart-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <h3><a href="shop-details.html">Black Rose Oil</a></h3>
                                    <p class="price">$89.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide cannabis flowers cbd-oil">
                            <div class="product-card style7">
                                <div class="product-img">
                                    <img src="{{ asset('front/assets/img/product/product-31.jpg') }}" alt="Image">
                                    <ul class="product-meta-option">
                                        <li><a href="shop-details.html"><i class="ri-eye-line"></i></a></li>
                                        <li><a href="cart.html"><i class="ri-shopping-cart-line"></i></a></li>
                                        <li><a href="wishlist.html"><i class="ri-heart-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <h3><a href="shop-details.html">Lemon Zkittez</a></h3>
                                    <p class="price">$74.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide cannabis cbd-oil">
                            <div class="product-card style7">
                                <div class="product-img">
                                    <img src="{{ asset('front/assets/img/product/product-32.jpg') }}" alt="Image">
                                    <ul class="product-meta-option">
                                        <li><a href="shop-details.html"><i class="ri-eye-line"></i></a></li>
                                        <li><a href="cart.html"><i class="ri-shopping-cart-line"></i></a></li>
                                        <li><a href="wishlist.html"><i class="ri-heart-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <h3><a href="shop-details.html">CBD Seeds</a></h3>
                                    <p class="price">$54.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide edibles cannabis flowers">
                            <div class="product-card style7">
                                <div class="product-img">
                                    <img src="{{ asset('front/assets/img/product/product-33.jpg') }}" alt="Image">
                                    <ul class="product-meta-option">
                                        <li><a href="shop-details.html"><i class="ri-eye-line"></i></a></li>
                                        <li><a href="cart.html"><i class="ri-shopping-cart-line"></i></a></li>
                                        <li><a href="wishlist.html"><i class="ri-heart-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <h3><a href="shop-details.html">Cannabis Oil</a></h3>
                                    <p class="price">$69.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide edibles cannabis cbd-oil flowers">
                            <div class="product-card style7">
                                <div class="product-img">
                                    <img src="{{ asset('front/assets/img/product/product-25.jpg') }}" alt="Image">
                                    <ul class="product-meta-option">
                                        <li><a href="shop-details.html"><i class="ri-eye-line"></i></a></li>
                                        <li><a href="cart.html"><i class="ri-shopping-cart-line"></i></a></li>
                                        <li><a href="wishlist.html"><i class="ri-heart-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <h3><a href="shop-details.html">Citric Krush</a></h3>
                                    <p class="price">$58.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide cannabis cbd-oil flowers">
                            <div class="product-card style7">
                                <div class="product-img">
                                    <img src="{{ asset('front/assets/img/product/product-26.jpg') }}" alt="Image">
                                    <ul class="product-meta-option">
                                        <li><a href="shop-details.html"><i class="ri-eye-line"></i></a></li>
                                        <li><a href="cart.html"><i class="ri-shopping-cart-line"></i></a></li>
                                        <li><a href="wishlist.html"><i class="ri-heart-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <h3><a href="shop-details.html">Elphabil Bliss</a></h3>
                                    <p class="price">$123.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide cannabis flowers edibles">
                            <div class="product-card style7">
                                <div class="product-img">
                                    <img src="{{ asset('front/assets/img/product/product-27.jpg') }}" alt="Image">
                                    <ul class="product-meta-option">
                                        <li><a href="shop-details.html"><i class="ri-eye-line"></i></a></li>
                                        <li><a href="cart.html"><i class="ri-shopping-cart-line"></i></a></li>
                                        <li><a href="wishlist.html"><i class="ri-heart-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <h3><a href="shop-details.html">Marley Indica</a></h3>
                                    <p class="price">$69.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide cbd-oil edibles">
                            <div class="product-card style7">
                                <div class="product-img">
                                    <img src="{{ asset('front/assets/img/product/product-28.jpg') }}" alt="Image">
                                    <ul class="product-meta-option">
                                        <li><a href="shop-details.html"><i class="ri-eye-line"></i></a></li>
                                        <li><a href="cart.html"><i class="ri-shopping-cart-line"></i></a></li>
                                        <li><a href="wishlist.html"><i class="ri-heart-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <h3><a href="shop-details.html">Amnesi Haze(CBD)</a></h3>
                                    <p class="price">$65.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide edible flower">
                            <div class="product-card style7">
                                <div class="product-img">
                                    <img src="{{ asset('front/assets/img/product/product-29.jpg') }}" alt="Image">
                                    <ul class="product-meta-option">
                                        <li><a href="shop-details.html"><i class="ri-eye-line"></i></a></li>
                                        <li><a href="cart.html"><i class="ri-shopping-cart-line"></i></a></li>
                                        <li><a href="wishlist.html"><i class="ri-heart-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <p class="price">$123.00</p>
                                    <h3><a href="shop-details.html">Sabotage 50ml</a></h3>
                                </div>
                            </div>
                        </div>
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
                                    <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">Best Offer</span>
                                    <h2>Muva Marijuanna Best Offer For Our Customers</h2>
                                    <p>There are many variations of passages of Lorem Ipsum available, bhe mred aln ine form, by injected humour, or randomised words which don't look even slilievable. If youre going to use a passage of Lorem Ipsum, you  to be sure there isn't anything </p>
                                </div>
                                <div class="countdown-deals text-center" data-countdown="2024/12/11"></div>
                                <a href="shop-right-sidebar.html" class="btn style1">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-md-1 order-1" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                            <div class="offer-pproduct-slider owl-carousel">
                                <div class="product-slide-item">
                                    <div class="discout">
                                        <span>15%</span> Off
                                    </div>
                                    <span class="product-offer-price">$130</span>
                                    <img src="{{ asset('front/assets/img/product/offer-slider-1.jpg') }}" alt="Image">
                                </div>
                                <div class="product-slide-item">
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
                                </div>
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
                                <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">Our Services</span>
                                <h2>Our Best Marijuanna Services</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="service-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                                <div class="service-icon">
                                   <i class="flaticon-meditation"></i>
                                </div>
                                <div class="service-info">
                                    <h3><a href="service-details.html">Promote Relaxation</a></h3>
                                    <p>Sed ut perspiciatis unde omnis is natus error sit voluptatem accus.</p>
                                </div>
                            </div>
                            <div class="service-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="300">
                                <div class="service-icon">
                                   <i class="flaticon-massage"></i>
                                </div>
                                <div class="service-info">
                                    <h3><a href="service-details.html">Remove Headache</a></h3>
                                    <p>Sed ut perspiciatis unde omnis is natus error sit voluptatem accus.</p>
                                </div>
                            </div>
                            <div class="service-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">
                                <div class="service-icon">
                                   <i class="flaticon-herbal"></i>
                                </div>
                                <div class="service-info">
                                    <h3><a href="service-details.html">Increase Appetite</a></h3>
                                    <p>Sed ut perspiciatis unde omnis is natus error sit voluptatem accus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="service-img-wrap" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                                <img src="{{ asset('front/assets/img/service/service-img-1.png') }}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="service-card style1" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                                <div class="service-icon">
                                    <i class="flaticon-back-1"></i>
                                </div>
                                <div class="service-info">
                                    <h3><a href="service-details.html">Relieves Pain</a></h3>
                                    <p>Sed ut perspiciatis unde omnis is natus error sit voluptatem accus </p>
                                </div>
                            </div>
                            <div class="service-card style1" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="300">
                                <div class="service-icon">
                                   <i class="flaticon-time-to-sleep"></i>
                                </div>
                                <div class="service-info">
                                    <h3><a href="service-details.html">Fights Insomnia</a></h3>
                                    <p>Sed ut perspiciatis unde omnis is natus error sit voluptatem accus.</p>
                                </div>
                            </div>
                            <div class="service-card style1" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="400">
                                <div class="service-icon">
                                   <i class="flaticon-cat"></i>
                                </div>
                                <div class="service-info">
                                    <h3><a href="service-details.html">Improves Mood</a></h3>
                                    <p>Sed ut perspiciatis unde omnis is natus error sit voluptatem accus.</p>
                                </div>
                            </div>
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
                    <div class="counter-card-wrap  pb-75">
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
                    </div>
                    <div class="row">
                        <div class="col-lg-6 order-lg-1 order-md-2 order-2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="apply-form">
                                <div class="content-title style1">
                                    <h2>Apply For Treatment</h2>
                                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms.</p>
                                </div>
                                <form action="#">
                                    <div class="form-group">
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn style1 w-100 d-block">Submit Application</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-md-1 order-1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="video-wrap bg-f video-bg-1">
                                <a class="play-now" data-fslightbox href="https://www.youtube.com/watch?v=UNSSuTSQI9I">
                                    <i class="ri-play-fill"></i>
                                    <span class="ripple"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-100 justify-content-center">
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="promo-card style1">
                                <div class="promo-title">
                                    <span class="promo-icon">
                                        <i class="flaticon-herbal-2"></i>
                                    </span>
                                    <h3>Best Herbs</h3>
                                </div>
                                <p>There are many variaties of rem amet consec but the major have suffered alteration in some case. </p>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                            <div class="promo-card style1">
                                <div class="promo-title">
                                    <span class="promo-icon">
                                        <i class="flaticon-medicine"></i>
                                    </span>
                                    <h3>Best Product</h3>
                                </div>
                                <p>There are many variaties of rem amet consec but the major have suffered alteration in some case. </p>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                            <div class="promo-card style1">
                                <div class="promo-title">
                                    <span class="promo-icon">
                                        <i class="flaticon-shipped"></i>
                                    </span>
                                    <h3>Home Delivery</h3>
                                </div>
                                <p>There are many variaties of rem amet consec but the major have suffered alteration in some case. </p>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500">
                            <div class="promo-card style1">
                                <div class="promo-title">
                                    <span class="promo-icon">
                                        <i class="flaticon-bong"></i>
                                    </span>
                                    <h3>Bong Medical</h3>
                                </div>
                                <p>There are many variaties of rem amet consec but the major have suffered alteration in some case. </p>
                            </div>
                        </div>
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
                                <img src="{{ asset('front/assets/img/about/feature-img-1.png') }}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-content">
                                <div class="content-title style1">
                                    <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">Recetional Medicine</span>
                                    <h2>Medical Marijuana Is Used To Many Health Problems</h2>
                                    <h6>All the Lorem Ipsum generators on the Internet tend to repeat defined chunks making this the first true generator on Internet.</h6>
                                    <p>There are many variations of passages of Lorem Ipsum available, bhe mred aln ine form, by injected humour, or randomised words which don't look even slilievable. If youre going to use a passage of lorem.</p>
                                </div>
                                <a href="about.html" class="btn style1 mt-30">Learn More</a>
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
                                <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">Newsletter</span>
                                <h2>Subscribe To Newsletter</h2>
                                <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks making this the first true generator consect.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form action="#" class="newsletter-form">
                                <input type="email" placeholder="Enter Your Email Address">
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
                        <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">Testimonials</span>
                        <h2>What Our Patient Say About Us</h2>
                    </div>
                    <div class="testimonial-slider-one owl-carousel">
                        <div class="testimonial-card style3">
                            <p class="client-quote">Occaecati cupiditate non provident simi que sunt in culpa  officia deunt mollitia anim id est laborum et dolorum fuga. Et harum quidem rerum facilis est etour expedita distinctio libero tempore dolor.</p>
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{ asset('front/assets/img/testimonials/client-1.jpg') }}" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3>Jim Morison</h3>
                                        <span>Director, BAT</span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-right-quote-sign"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card style3">
                            <p class="client-quote">Occaecati cupiditate non provident simi que sunt in culpa  officia deunt mollitia anim id est laborum et dolorum fuga. Et harum quidem rerum facilis est etour expedita distinctio libero tempore dolor.</p>
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{ asset('front/assets/img/testimonials/client-2.jpg') }}" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3>Alex Cruis</h3>
                                        <span>CEO, IBAC</span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-right-quote-sign"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card style3">
                            <p class="client-quote">Occaecati cupiditate non provident simi que sunt in culpa  officia deunt mollitia anim id est laborum et dolorum fuga. Et harum quidem rerum facilis est etour expedita distinctio libero tempore dolor.</p>
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{ asset('front/assets/img/testimonials/client-3.jpg') }}" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3>Tom Haris</h3>
                                        <span>Engineer, Olleo</span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-right-quote-sign"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card style3">
                            <p class="client-quote">Occaecati cupiditate non provident simi que sunt in culpa  officia deunt mollitia anim id est laborum et dolorum fuga. Et harum quidem rerum facilis est etour expedita distinctio libero tempore dolor.</p>
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{ asset('front/assets/img/testimonials/client-4.jpg') }}" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3>Harry Jackson</h3>
                                        <span>Enterpreneur</span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-right-quote-sign"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card style3">
                            <p class="client-quote">Occaecati cupiditate non provident simi que sunt in culpa  officia deunt mollitia anim id est laborum et dolorum fuga. Et harum quidem rerum facilis est etour expedita distinctio libero tempore dolor.</p>
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{ asset('front/assets/img/testimonials/client-5.jpg') }}" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3>Chris Haris</h3>
                                        <span>MD, ITec</span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-right-quote-sign"></i>
                                </div>
                            </div>
                        </div>
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
                                <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">Our blog</span>
                                <h2>Natest News &amp; Articles</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="blog-card style1">
                                <div class="blog-img">
                                    <img src="{{ asset('front/assets/img/blog/blog-1.jpg') }}" alt="Image">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="blog-details-right-sidebar.html">How Do I Access Medical  Cannabis Prescription</a></h3>
                                    <p>On the other hand, we denounce with riindi gnation and dislike men who are.</p>
                                    <a href="blog-details-right-sidebar.html" class="link style1">Read More</a>
                                </div>
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-calendar-2-line"></i><a href="posts-by-date.html">22 Jun, 2024</a></li>
                                    <li><i class="ri-chat-3-line"></i>No Comment</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                            <div class="blog-card style1">
                                <div class="blog-img">
                                    <img src="{{ asset('front/assets/img/blog/blog-2.jpg" alt="Image">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="blog-details-right-sidebar.html">Use Of Medical Cannabis In  Improving Symptoms</a></h3>
                                    <p>On the other hand, we denounce with riindi gnation and dislike men who are.</p>
                                    <a href="blog-details-right-sidebar.html" class="link style1">Read More</a>
                                </div>
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-calendar-2-line"></i><a href="posts-by-date.html">13 Jun, 2024</a></li>
                                    <li><i class="ri-chat-3-line"></i>No Comment</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                            <div class="blog-card style1">
                                <div class="blog-img">
                                <img src="{{ asset('front/assets/img/blog/blog-2.jpg" alt="Image">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="blog-details-right-sidebar.html">A Guide For Natural And  Sustainable Beauty Routine</a></h3>
                                    <p>On the other hand, we denounce with riindi gnation and dislike men who are.</p>
                                    <a href="blog-details-right-sidebar.html" class="link style1">Read More</a>
                                </div>
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-calendar-2-line"></i><a href="posts-by-date.html">15 May, 2024</a></li>
                                    <li><i class="ri-chat-3-line"></i>No Comment</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Blog Section End -->
@endsection