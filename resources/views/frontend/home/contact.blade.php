@extends('frontend.layouts.app')
@section('content')
            <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f banner_contactus">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>Contact</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="{{route('homepage')}}" style="color:#000">Home </a></li>
                                <li style="color:#000">Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- Contact Us section Start -->
                <section class="contact-us-wrap pt-100 pb-75">
                    <div class="container">
                        <!-- <div class="section-title style1 text-center mb-40">
                            <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">Local Store</span>
                            <h2>Looking For Our Local Store</h2>
                        </div> -->
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="contact-item">
                                    @php
                                    $setting = \App\Models\Setting::first();
                                    @endphp
                                    <img src="{{ asset('front/assets/img/shape-6.png') }}" alt="Image" class="contact-shape">
                                    <h3>Here To Help</h3>
                                    <ul class="contact-info list-style">
                                        <li><i class="flaticon-pin"></i><p>mleyered F-98,Industrial Area Bahadrabad Haridwar Uk-249403</p></li>
                                        <li><i class="flaticon-call-1"></i><a href="tel:9411572004">9411572004, 01334-231115</a></li>
                                        <li><i class="flaticon-email-2"></i><a href="mailto:support@mleyered.com.com">support@mleyered.com.com</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="contact-item">
                                    <img src="{{ asset('front/assets/img/shape-6.png') }}" alt="Image" class="contact-shape">
                                    <h3>Let's Join Hands For Job</h3>
                                    <ul class="contact-info list-style">
                                        <li><i class="flaticon-brain"></i><p>want to work with us, drop us your resume </p></li>
                                        <li><i class="flaticon-call-1"></i><a href="tel:9411572004"> 9411572004, 01334-231115</a></li>
                                        <li><i class="flaticon-email-2"></i><a href="mailto:marketing@mleyered.com">marketing@mleyered.com</a></li>
                                    </ul>
                                </div>
                            </div>
                             <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="contact-item">
                                    <img src="{{ asset('front/assets/img/shape-6.png') }}" alt="Image" class="contact-shape">
                                    <h3>Connect With Us For Business Enquiries</h3>
                                    <ul class="contact-info list-style">
                                        <li><i class="flaticon-drop"></i><p>Drop me an email for any business related proposals</p></li>
                                        <li><i class="flaticon-call-1"></i><a href="tel:7618340004">7618340004</a></li>
                                        <li><i class="flaticon-email-2"></i><a href="mailto:business@mleyered.com">business@mleyered.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Contact Us section End -->

                <!-- Contact Form Start -->
                <section class="contact-form-wrap bg-albastor ptb-50">
                    <div class="container">
                        <div class="section-title text-center mb-40">
                            <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">Contact Us</span>
                            <h2>Contact Us For Any Query</h2>
                        </div>
                        <div class="row">
                            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                                <div class="contact-form">
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
                        </div>
                    </div>
                </section>
                <section class="testimonial-wrap ptb-50 bg-albastor">
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
                <!-- Contact Form End -->

                <!-- Map Start -->
                <div class="comp-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.809581960372!2d78.05315937554933!3d29.92738367498278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3909499a73678e67%3A0x1a1c40825daa96ec!2sMleyered%20Ayurvedic!5e0!3m2!1sen!2sin!4v1728926863789!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- Map End -->

            </div>
            <!-- Content Wrapper End -->
@endsection