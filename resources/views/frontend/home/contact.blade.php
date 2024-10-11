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
                        <div class="section-title style1 text-center mb-40">
                            <span><img src="{{ asset('front/assets/img/section-img.png') }}" alt="Image">Local Store</span>
                            <h2>Looking For Our Local Store</h2>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="contact-item">
                                    @php
                                    $setting = \App\Models\Setting::first();
                                    @endphp
                                    <img src="{{ asset('front/assets/img/shape-6.png') }}" alt="Image" class="contact-shape">
                                    <h3>Address</h3>
                                    <ul class="contact-info list-style">
                                        <li><i class="flaticon-pin"></i><p>{{$setting->address}}</p></li>
                                        <li><i class="flaticon-call-1"></i><a href="tel:{{$setting->phone}}">{{$setting->phone}}</a></li>
                                        <li><i class="flaticon-email-2"></i><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Contact Us section End -->

                <!-- Contact Form Start -->
                <section class="contact-form-wrap bg-albastor ptb-100">
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
                <!-- Contact Form End -->

                <!-- Map Start -->
                <div class="comp-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55324.21078212139!2d77.98967587689286!3d29.928719467635982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3909490574593791%3A0x1f08c174d515601e!2sA%26A%20Ayurvedic(Manufacturer%20Of%20Ayurvedic%20Medicines)!5e0!3m2!1sen!2sin!4v1728491773566!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- Map End -->

            </div>
            <!-- Content Wrapper End -->
@endsection