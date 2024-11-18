@extends('frontend.layouts.app')
@section('content')
    <!-- Content Wrapper Start -->
    <div class="content-wrapper">

        <!-- Contact Us section Start -->
        <section class="contact-us-wrap pt-100 pb-75">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <p>Your cart looks empty</p>
                    <a href="{{ route('getProducts') }}"
                       class="btn mt-3"
                       style="background-color: #80dc12; color: #fff; padding: 8px 16px; font-size: 14px; border-radius: 4px; width: auto;">
                        Go to Shopping Page
                    </a>
                </div>
            </div>
        </section>
        <!-- Contact Us section End -->

        <section class="testimonial-wrap ptb-50 bg-albastor">
            <div class="container">
                <div class="container features-contact-us-container">
                </div>
            </div>
        </section>
        <!-- Contact Form End -->

    </div>
    <!-- Content Wrapper End -->
@endsection