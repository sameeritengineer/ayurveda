@extends('frontend.layouts.app')
@section('content')
            <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f br-1">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>Frequently Asked Questions</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="index.html">Home </a></li>
                                <li>FAQ</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- FAQ Section start -->
                <section class="faq-wrap ptb-100">
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-xl-10 offset-xl-1">
                                <div class="accordion" id="accordionExample">
                                    @forelse($faqs as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-{{$faq->id}}"
                                                aria-expanded="true" aria-controls="collapse-{{$faq->id}}">
                                                <span>
                                                    <i class="flaticon-plus plus"></i>
                                                    <i class="flaticon-minus-sign"></i>
                                                </span>
                                                {{$faq->questions}}
                                            </button>
                                        </h2>
                                        <div id="collapse-{{$faq->id}}" class="accordion-collapse collapse @if($faq->id == 1)show @endif"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="single-product-text">
                                                     <p>{{$faq->answers}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <h1>No Faq's</h2>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- FAQ Section end -->

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

            </div>
            <!-- Content Wrapper End -->
@endsection