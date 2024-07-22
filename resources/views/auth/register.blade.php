@extends('frontend.layouts.app')
@section('content')
<!-- Content Wrapper Start -->
<div class="content-wrapper">

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap bg-f br-4">
    <div class="container">
        <div class="breadcrumb-title">
            <h2>Register</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a href="index.html">Home </a></li>
                <li>Register</li>
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
                        <h3>Register</h3>
                    </div>
                    <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

<form method="POST" class="login-form" action="{{ route('register') }}">
    @csrf
<div class="row">
    <!-- Name -->
    <div class="col-lg-12">
        <div class="form-group">
            <x-input id="name" class="block mt-1 w-full" placeholder="Name" type="text" name="name" :value="old('name')" required autofocus />
        </div>
    </div>     

    <!-- Email Address -->
    <div class="col-lg-12">
        <div class="form-group">
        <x-input id="email" class="block mt-1 w-full" placeholder="Email Address" type="email" name="email" :value="old('email')" required />
        </div>
    </div> 

    <!-- Password -->
    <div class="col-lg-12">
    <div class="form-group">

        <x-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        placeholder="Password"
                        required autocomplete="new-password" />
    </div>
    </div>

    <!-- Confirm Password -->
    <div class="col-lg-12">
    <div class="form-group">

        <x-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        placeholder="Confirm Password"
                        name="password_confirmation" required />
    </div>
    </div>

    <div class="col-lg-12">
        <div class="form-group">
            <x-button class="btn style1 w-100 d-block">
            {{ __('Register') }}
        </x-button>
        </div>
    </div>
    <div class="col-md-12">
        <p class="mb-0">Have an Account? <a class="link style1" href="{{ route('login') }}">Sign In</a></p>
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
