@extends('frontend.layouts.app')
@section('content')
            <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f br-1">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>Login</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="index.html">Home </a></li>
                                <li>Login</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                 <!-- Account Section start -->
                 <section class="Login-wrap pt-100 pb-75">
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                                <div class="login-form-wrap">
                                    <div class="login-header">
                                        <h3>Login</h3>
                                    </div>
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />                        
            <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="row">             
            <div class="col-lg-12">
                <div class="form-group">
                    <x-input id="email" class="block mt-1 w-full" placeholder="Email Address" type="email" name="email" :value="old('email')" required autofocus />
                </div>
            </div>

            <!-- Password -->

            <div class="col-lg-12">
                <div class="form-group">
                    <label for="fname"></label>
                    <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required autocomplete="current-password" />
                </div>
            </div>

            <!-- Remember Me -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end mb-20">
                @if (Route::has('password.request'))
                    <a class="ink style1" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                @endif
            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <x-button class="btn style1 w-100 d-block">
                    {{ __('Log in') }}
                </x-button>
                </div>
            </div>
            <div class="col-md-12">
                <p class="mb-0">Don't have an Account? <a class="link style1" href="{{route('register')}}">Create One</a></p>
            </div>
            </div>
        </form>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </section>
                <!-- Account Section end -->

            </div>
            <!-- Content Wrapper End -->
@endsection
