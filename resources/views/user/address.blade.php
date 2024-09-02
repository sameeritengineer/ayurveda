@extends('frontend.layouts.app')
@section('content')
    <!-- Content Wrapper Start -->
    <div class="content-wrapper">

        <!-- Breadcrumb Start -->
        <!-- <div class="breadcrumb-wrap bg-f br-4">
            <div class="container">
                <div class="breadcrumb-title">
                    <h2>User Address </h2>
                    <ul class="breadcrumb-menu list-style">
                        <li><a href="index.html">Home </a></li>
                        <li>User Address</li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- Breadcrumb End -->

        <!-- Account Section start -->
        <section class="Login-wrap pt-100 pb-75">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <div class="login-form-wrap">
                            <div class="login-header">
                                <h3>Add Address</h3>
                            </div>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form class="login-form" method="POST" action="{{route('user.store-address')}}">
                                @csrf

                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <x-input id="name" class="block mt-1 w-full" placeholder="Full Name" type="text" name="name" :value="old('name')" required autofocus />
                                        </div>
                                    </div>

                                    <!-- Email Address -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <x-input id="email" class="block mt-1 w-full" placeholder="Email Address" type="email" name="email" :value="old('email')" required />
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <x-input id="phone" class="block mt-1 w-full" placeholder="Phone Number" type="text" name="phone" :value="old('phone')" required />
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select id="country" class="block mt-1 w-full form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="country" required>
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->name }}" data-id="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- State -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select id="state" class="block mt-1 w-full form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="state" required>
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- City -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select id="city" class="block mt-1 w-full form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="city" required>
                                                <option value="">Select City</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Zip Code -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <x-input id="zip" class="block mt-1 w-full" placeholder="Zip Code" type="text" name="zip" :value="old('zip')" required />
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea id="address" class="block mt-1 w-full form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" placeholder="Address" name="address" required>{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                    
                                 

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <x-button class="btn style1 w-100 d-block">
                                                {{ __('Submit') }}
                                            </x-button>
                                        </div>
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
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#country').on('change', function() {
            var country_id = $(this).find('option:selected').data('id'); 
            if(country_id) {
                $.ajax({
                    url: '{{ route("user.get-states", ":country_id") }}'.replace(':country_id', country_id),
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#state').empty();
                        $('#state').append('<option value="">Select State</option>');
                        $.each(data, function(key, value) {
                            $('#state').append('<option value="'+ value.name +'" data-id="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('#state').empty();
                $('#city').empty();
            }
        });

        $('#state').on('change', function() {
            var state_id = $(this).find('option:selected').data('id'); 
            if(state_id) {
                $.ajax({
                    url: '{{ route("user.get-cities", ":state_id") }}'.replace(':state_id', state_id),
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#city').empty();
                        $('#city').append('<option value="">Select City</option>');
                        $.each(data, function(key, value) {
                            $('#city').append('<option value="'+ value.name +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('#city').empty();
            }
        });
    });
</script>
@endpush

