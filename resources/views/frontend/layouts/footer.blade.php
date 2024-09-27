@php
$setting = \App\Models\Setting::first();
@endphp
<footer class="footer-wrap style1" style="background-color:#1c363d">
                <img src="{{ asset('front/assets/img/footer-shape-1.png') }}" alt="Image" class="footer-shape-one">
                <img src="{{ asset('front/assets/img/footer-shape-2.png') }}" alt="Image" class="footer-shape-two moveVertical  sm-none">
                <img src="{{ asset('front/assets/img/footer-shape-3.png') }}" alt="Image" class="footer-shape-three moveHorizontal">
                <img src="{{ asset('front/assets/img/footer-shape-4.png') }}" alt="Image" class="footer-shape-four animationFramesTwo sm-none">
                <div class="container">
                    <div class="row pt-100 pb-75">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="footer-widget">
                                <a href="{{route('homepage')}}">
                                    <img src="{{ asset($setting->logo ?? '') }}" alt="Image">
                                </a>
                                <p class="comp-desc">
                                    {{$setting->footer_description ?? ''}}
                                </p>
                                @php 
                                
                                $social = json_decode($setting->social ?? '');
                                
                                @endphp
                                <ul class="social-profile style1 list-style">
                                    <li>
                                        <a target="_blank" href="{{ $social->facebook ?? '' }}">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{ $social->instagram ?? '' }}">
                                            <i class="ri-twitter-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{ $social->instagram ?? '' }}">
                                            <i class="ri-instagram-line"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{ $social->linkedin ?? '' }}">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Quick Links</h3>
                                <ul class="footer-menu list-style">
                                    <li>
                                        <a href="{{route('about')}}">
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('getProducts')}}">
                                            Visit Our Store
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('contact')}}">
                                        Contact
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 ps-lg-5">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Explore</h3>
                                <ul class="footer-menu list-style">
                                    <li>
                                        <a href="{{route('all-blogs')}}">
                                            News &amp; Articles
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('faqs')}}">
                                            FAQ's
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('pages',['slug'=>'privacy-policy'])}}">
                                        Privacy Policy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('pages',['slug'=>'terms-of-service'])}}">
                                           Terms &amp; Conditions
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Contact Us</h3>
                                <ul class="contact-info list-style">
                                    <li>
                                        <i class="flaticon-call-1"></i>
                                        <h6>Phone</h6>
                                        <a href="tel:{{$setting->phone ?? ''}}">{{$setting->phone ?? ''}}</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-pin"></i>
                                        <h6>Email</h6>
                                        <a href="mailto:{{$setting->email ?? ''}}">{{$setting->email ?? ''}}</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-email-2"></i>
                                        <h6>Address</h6>
                                        <p>{{$setting->address ?? ''}}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="copyright-text"><i class="ri-copyright-line"></i> {!! $setting->right_reserve ?? '' !!}</p>
            </footer>