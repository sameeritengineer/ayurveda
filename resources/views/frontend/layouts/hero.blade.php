<section class="hero-wrap style1" style="background-color:{{$setting->background_color ?? '#015C3B'}}">
                <div class="hero-shape-wrap" data-speed="0.11" data-revert="true">
                    <img src="{{ asset('front/assets/img/hero/hero-shape-1.png') }}" alt="Image" class="hero-shape-one">
                    <img src="{{ asset('front/assets/img/hero/hero-shape-2.png') }}" alt="Image" class="hero-shape-two">
                    <img src="{{ asset('front/assets/img/hero/hero-shape-3.png') }}" alt="Image" class="hero-shape-three">
                    <img src="{{ asset('front/assets/img/hero/hero-shape-4.png') }}" alt="Image" class="hero-shape-four">
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="hero-content">
                                <h1 data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">{{$setting->title ?? ''}}</h1>
                                <p data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">{{$setting->description ?? ''}}</p>
                                <a href="shop-right-sidebar.html" class="btn cstylebtn" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="hero-img-wrap">
                                {{-- <div class="discunt-price">25% <br>off</div> --}}
                                <img class="hero-img" src="{{ asset($setting->slider_image ?? '') }}" alt="Image">
                                <img class="rotate" src="{{ asset('front/assets/img/hero/hero-img-shape.png') }}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </section>