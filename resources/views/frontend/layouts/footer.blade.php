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
                                    <li>
                                        <a href="{{route('pages',['slug'=>'shipping-policy'])}}">
                                        Shipping Policy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('pages',['slug'=>'refund-return-policy'])}}">
                                        Refund & Return Policy
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

                    <div class="col-12 col-md col-md-auto footer__block center middle mob-block">
      <div class="start">
        <svg class="icon icon-color" viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38" height="24" aria-labelledby="pi-visa"><title id="pi-visa">Visa</title><path opacity=".07" d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"></path><path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"></path><path d="M28.3 10.1H28c-.4 1-.7 1.5-1 3h1.9c-.3-1.5-.3-2.2-.6-3zm2.9 5.9h-1.7c-.1 0-.1 0-.2-.1l-.2-.9-.1-.2h-2.4c-.1 0-.2 0-.2.2l-.3.9c0 .1-.1.1-.1.1h-2.1l.2-.5L27 8.7c0-.5.3-.7.8-.7h1.5c.1 0 .2 0 .2.2l1.4 6.5c.1.4.2.7.2 1.1.1.1.1.1.1.2zm-13.4-.3l.4-1.8c.1 0 .2.1.2.1.7.3 1.4.5 2.1.4.2 0 .5-.1.7-.2.5-.2.5-.7.1-1.1-.2-.2-.5-.3-.8-.5-.4-.2-.8-.4-1.1-.7-1.2-1-.8-2.4-.1-3.1.6-.4.9-.8 1.7-.8 1.2 0 2.5 0 3.1.2h.1c-.1.6-.2 1.1-.4 1.7-.5-.2-1-.4-1.5-.4-.3 0-.6 0-.9.1-.2 0-.3.1-.4.2-.2.2-.2.5 0 .7l.5.4c.4.2.8.4 1.1.6.5.3 1 .8 1.1 1.4.2.9-.1 1.7-.9 2.3-.5.4-.7.6-1.4.6-1.4 0-2.5.1-3.4-.2-.1.2-.1.2-.2.1zm-3.5.3c.1-.7.1-.7.2-1 .5-2.2 1-4.5 1.4-6.7.1-.2.1-.3.3-.3H18c-.2 1.2-.4 2.1-.7 3.2-.3 1.5-.6 3-1 4.5 0 .2-.1.2-.3.2M5 8.2c0-.1.2-.2.3-.2h3.4c.5 0 .9.3 1 .8l.9 4.4c0 .1 0 .1.1.2 0-.1.1-.1.1-.1l2.1-5.1c-.1-.1 0-.2.1-.2h2.1c0 .1 0 .1-.1.2l-3.1 7.3c-.1.2-.1.3-.2.4-.1.1-.3 0-.5 0H9.7c-.1 0-.2 0-.2-.2L7.9 9.5c-.2-.2-.5-.5-.9-.6-.6-.3-1.7-.5-1.9-.5L5 8.2z" fill="#142688"></path></svg>
        <svg class="icon icon-color" viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38" height="24" aria-labelledby="pi-master"><title id="pi-master">Mastercard</title><path opacity=".07" d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"></path><path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"></path><circle fill="#EB001B" cx="15" cy="12" r="7"></circle><circle fill="#F79E1B" cx="23" cy="12" r="7"></circle><path fill="#FF5F00" d="M22 12c0-2.4-1.2-4.5-3-5.7-1.8 1.3-3 3.4-3 5.7s1.2 4.5 3 5.7c1.8-1.2 3-3.3 3-5.7z"></path></svg>
        <svg class="icon icon-color" viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" width="38" height="24" role="img" aria-labelledby="pi-rupay"><title id="pi-rupay">RuPay</title><g fill="none" fill-rule="evenodd"><rect stroke-opacity=".07" stroke="#000" fill="#FFF" x=".5" y=".5" width="37" height="23" rx="3"></rect><path fill="#097A44" d="M32 15.77l2-7.41 2 3.82z"></path><path fill="#F46F20" d="M30.76 15.79l2-7.4 2 3.82z"></path><path d="M20.67 8.2a2 2 0 0 0-1.56-.56h-3l-1.95 6.81h1.75l.66-2.31h1.23a3.4 3.4 0 0 0 1.9-.5 2.93 2.93 0 0 0 1.12-1.72 1.77 1.77 0 0 0-.15-1.72zm-3.21.94h1.12a.76.76 0 0 1 .55.15c.11.11.07.35 0 .53a1.08 1.08 0 0 1-.4.62 1.21 1.21 0 0 1-.7.2H17l.46-1.5zM9.14 9a1.64 1.64 0 0 0-.2-.61 1.3 1.3 0 0 0-.58-.53 2.75 2.75 0 0 0-1.08-.18H4l-2 6.75h1.73l.72-2.52H5.7c.47 0 .58.1.6.13.02.03.09.15 0 .65l-.16.6a3.35 3.35 0 0 0-.11.59v.55h1.79l.12-.43-.11-.08s-.07-.05-.06-.2c.027-.19.07-.377.13-.56l.1-.42a2.14 2.14 0 0 0 .1-1.11.88.88 0 0 0-.26-.41 2 2 0 0 0 .68-.54 2.79 2.79 0 0 0 .53-1c.07-.22.101-.45.09-.68zm-1.86.83a.84.84 0 0 1-.5.6 1.79 1.79 0 0 1-.64.09H4.86l.38-1.33h1.43a1.1 1.1 0 0 1 .53.09c.05 0 .21.07.08.5v.05zm4.9 2.17a2.11 2.11 0 0 1-.3.67 1 1 0 0 1-.87.43c-.34 0-.36-.14-.38-.2a1.24 1.24 0 0 1 .07-.52l.89-3.11H9.9l-.86 3a3 3 0 0 0-.15 1.32c.08.42.4.91 1.41.91.247.004.493-.03.73-.1a2.51 2.51 0 0 0 .6-.29l-.08.3h1.62l1.47-5.13H13L12.18 12zm12.93 1.1l.63-2.18c.24-.83-.07-1.21-.37-1.39A2.75 2.75 0 0 0 24 9.2a2.87 2.87 0 0 0-2 .68 2.75 2.75 0 0 0-.69 1.1l-.09.26h1.61v-.11a1.15 1.15 0 0 1 .25-.37.84.84 0 0 1 .56-.17.89.89 0 0 1 .46.08v.18c0 .06 0 .15-.25.23a2.13 2.13 0 0 1-.48.1l-.44.05a4 4 0 0 0-1.25.32c-.57.271-.99.78-1.15 1.39a1.25 1.25 0 0 0 .17 1.22c.289.307.7.468 1.12.44a2.43 2.43 0 0 0 1.07-.25l.4-.23v.33H25l.13-.48-.13-.07a.61.61 0 0 1 0-.22c0-.25.07-.43.11-.58zm-2.92-.1a.62.62 0 0 1 .34-.4 2.17 2.17 0 0 1 .57-.15l.29-.05.3-.07v.07a1.24 1.24 0 0 1-.51.75 1.44 1.44 0 0 1-.72.21.34.34 0 0 1-.25-.08.55.55 0 0 1-.02-.28zm7.91-3.68l-1.69 3v-3h-1.8l.39 5.13-.12.19a.8.8 0 0 1-.23.25.64.64 0 0 1-.24.08h-.68l-.39 1.37h.83a2 2 0 0 0 1.29-.34 9.55 9.55 0 0 0 1.27-1.71l3.17-5-1.8.03z" fill="#302F82"></path></g></svg>
        <svg class="icon icon-color" viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="38" height="24" role="img" aria-labelledby="pi-netbanking"><title id="pi-netbanking">NetBanking</title><rect x=".5" y=".5" width="37" height="23" rx="3" ry="3" fill="#fff" stroke="#000" stroke-opacity=".07"></rect><path d="M19 4.5l-7.5 5.63h15L19 4.5zm6.56 13.13H12.44a.94.94 0 0 0-.94.94v.93h15v-.94a.94.94 0 0 0-.94-.93zm-5.62-6.57h1.88v5.63h-1.88zm3.75 0h1.88v5.63h-1.88zm-7.5 0h1.88v5.63h-1.88zm-3.75 0h1.88v5.63h-1.88z"></path></svg>
      </div>
  <div class="start"><p>100% Secure Payments</p></div>
  </div>
                </div>
                <p class="copyright-text"><i class="ri-copyright-line"></i> {!! $setting->right_reserve ?? '' !!}</p>
            </footer>