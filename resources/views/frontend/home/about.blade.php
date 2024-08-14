@extends('frontend.layouts.app')
@section('content')
<!-- Content Wrapper Start -->
<div class="content-wrapper">

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap bg-f br-1">
    <div class="container">
        <div class="breadcrumb-title">
            <h2>About</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a href="index.html">Home </a></li>
                <li>About</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- About Section Start -->
<section class="about-wrap style3 ptb-100">
    <div class="container">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <div class="about-img-wrap">
                    <div class="about-shape-one">
                        <img src="{{ asset('front/assets/img/about/about-shape-6.png') }}" alt="Iamge" class="bounce">
                    </div>
                    <img src="{{ asset('front/assets/img/about/about-img-3.png') }}" alt="Image">
                    <div class="discunt-price">25% <br>off</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="content-title style1 mb-0">
                        <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">About Us</span>
                        <h2>Who We Are</h2>
                        <p>In the heart of Uttarakhand, where ancient whispers mingle with the modern breeze, Mleyered Ayurvedic House of A&amp;A Ayurvedic stands as a testament to timeless wisdom embraced by future-focused innovation. Founded on the legacy of Mr. Prem Niwas and Mrs. Kamlesh, and now expertly guided by their sons, A&amp;A Ayurvedic is more than just a name; it’s a connection.“Authenticity from Ancient Traditions” is the tagline that links the dependable Ayurvedic traditions to the demands of your busy life.</p>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-lg-12 mt-3">
    <div class="about-content">
                    <div class="content-title style1 mb-0">
                        <h2>Our Mission</h2>
                        <p>At Mleyered Ayurvedic House of A&amp;A Ayurvedic, our mission is to provide a path to holistic well-being, rooted in the ancient science of balancing your Tridoshas – Vata, Pitta, and Kapha. We understand the challenges of maintaining inner equilibrium in today’s dynamic world. That’s why we go beyond offering mere products; we offer a journey to reconnect with your roots, rediscover your rhythm, and embark on a healthier you.</p>
                    </div>
                </div>
    </div>

    <div class="col-lg-12 mt-3">
    <div class="about-content">
                    <div class="content-title style1 mb-0">
                        <h2>Quality Assurance</h2>
                        <p>Our offerings are not just formulas; they are handcrafted expressions of purity. Each 100% herbal creation whispers of ancient secrets, meticulously crafted by skilled artisans using time-honored techniques. We are committed to maintaining the highest standards of quality, ensuring that every product is a true reflection of our dedication to authenticity and well-being.</p>
                    </div>
                </div>
    </div>

    <div class="col-lg-12 mt-3">
    <div class="about-content">
                    <div class="content-title style1 mb-0">
                        <h2>Why Us?</h2>
                        <p>Choose Mleyered Ayurvedic House of A&amp;A Ayurvedic for a unique blend of tradition and innovation. Our products are crafted with care, embodying the rich heritage of Ayurvedic wisdom. With a deep understanding of the ancient science of Ayurveda, we provide solutions that are not just effective but also align with the natural rhythms of your body. Trust us to bring you purity,authenticity, and a path to holistic health.</p>
                        <p>Reconnect with your roots, rediscover your rhythm, and embark on a journey to a healthier you with Mleyered House of A&amp;A Ayurvedic: where the past whispers wisdom, the future blossoms with well-being, and authenticity flows from ancient traditions.</p>
                    </div>
                </div>
    </div>
    

    </div>
</section>
<!-- About Sectin End -->

<!-- Product Category Section Start -->
<section class="product-cat-wrap pb-75">
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
</div>
<!-- Content Wrapper End -->
@endsection