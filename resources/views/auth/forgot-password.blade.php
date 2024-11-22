<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <img class="logo-light" src="{{ asset('front/assets/img/logoheader.png') }}" alt="logo">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and phone number, and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <?php
               $countries = \App\Models\Country::orderBy('shortname', 'asc')->get();

            ?>
            <!-- Country Code and Phone Number -->
            <input type="hidden" value="+91" name="country_code">
            <div class="mt-4 flex items-center">
               {{-- <div class="mr-2">
                    <x-label for="country_code" :value="__('Country Code')" />
                    <select id="country_code" name="country_code" class="block mt-1 w-full">
                        @foreach($countries as $country)
                            <option value="+{{ $country->phonecode }}">{{ $country->phonecode }} ({{ $country->shortname }})</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="flex-1">
                    <x-label for="phone" :value="__('Phone Number')" />
                    <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>