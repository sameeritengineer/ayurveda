@extends('frontend.layouts.app')
@section('content')
<!-- Content Wrapper Start -->
<div class="content-wrapper">

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap bg-f br-1">
    <div class="container">
        <div class="breadcrumb-title">
            <h2>Testimonials</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a href="{{route('homepage')}}">Home </a></li>
                <li>Testimonials</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Testimonial Section Start -->
<section class="testimonial-wrap pt-100 pb-75 bg-albastor">
    <div class="container">
        <div class="row justify-content-center">
        @foreach($testimonials as $test)
            <div class="col-lg-6 col-md-6">
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
            </div>
        @endforeach
        </div>
    </div>
</section>  
<!-- Testimonial Section End -->

</div>
<!-- Content Wrapper End -->
@endsection