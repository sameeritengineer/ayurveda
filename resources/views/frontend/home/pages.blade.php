@extends('frontend.layouts.app')
@section('content')
            <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f banner_{{$page->slug}}">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>{{$page->name}}</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="{{route('homepage')}}" style="color:#000">Home </a></li>
                                <li style="color:#000">{{$page->name}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- Terms Section start -->
                <section class="terms-wrap ptb-100 pb-75">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1">
                             {!! $page->description !!}
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Terms Section end -->


            </div>
            <!-- Content Wrapper End -->
@endsection