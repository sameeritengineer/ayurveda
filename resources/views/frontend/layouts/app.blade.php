<!DOCTYPE html>
<html lang="zxx">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Link of CSS files -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/remixicon.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/swiper.bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/odometer.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/aos.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/dark-theme.css') }}">

        <title>Muva - Medical Marijuana & Cannabis Shop HTML Template</title>
        <link rel="icon" type="image/png" href="{{ asset('front/assets/img/favicon.png') }}">
    </head>

    <body>

        <!--Preloader starts-->
         <div class="preloader js-preloader">
            <img src="{{ asset('front/assets/img/preloader.gif') }}" alt="Image">
        </div>
        <!--Preloader ends-->

        <!-- Theme Switcher Start -->
        <div class="switch-theme-mode">
            <label id="switch" class="switch">
                    <input type="checkbox" onchange="toggleTheme()" id="slider">
                    <span class="slider round"></span>
            </label>
        </div>
        <!-- Theme Switcher End -->

        <div class="body_overlay"></div>

        <!-- Page Wrapper End -->
        <div class="page-wrapper">

            <!-- Header Section Start -->
            @if(Route::is('/')) 
            @include('frontend.layouts.header')
            @else
            @include('frontend.layouts.header2')
            @endif
            <!-- Header Section End -->
            
            @yield('content')
            
            <!-- Footer Section Start -->
            @include('frontend.layouts.footer')
            <!-- Footer Section End -->
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <!-- Toasts will be dynamically added here -->
            </div>
        
        </div>
        <!-- Page Wrapper End -->
        
        <!-- Back-to-top button Start -->
         <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>
        <!-- Back-to-top button End -->

        <!-- Link of JS files -->
        <script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/form-validator.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/contact-form-script.js') }}"></script>
        <script src="{{ asset('front/assets/js/aos.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/jquery.appear.js') }}"></script>
        <script src="{{ asset('front/assets/js/odometer.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/fslightbox.js') }}"></script>
        <script src="{{ asset('front/assets/js/tweenmax.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('front/assets/js/main.js') }}"></script>
        <script>
                 // Function to display toast notifications
     function showToast(type, message) {
        $('.toast').remove();
        toastHTML = `
            <div class="toast bg-${type === 'success' ? 'success' : 'danger'} text-white" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                <div class="toast-header bg-${type === 'success' ? 'success' : 'danger'} text-white">
                    <strong class="mr-auto">${type.charAt(0).toUpperCase() + type.slice(1)}</strong>
                    <small>Just now</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    ${message}
                </div>
            </div>
        `;
        
        $('.toast-container').append(toastHTML);  // Append toast to container
        $('.toast').toast('show');  // Show the toast
    }    
        </script>
        @include('frontend.layouts.scripts')
        @stack('scripts')
    </body>

</html>