@php
$setting = \App\Models\Setting::first();
@endphp
<header class="header-wrap style1">
                <div class="container">
                    <div class="header-box">
                        <nav class="navbar navbar-expand-md navbar-light">
                            <a class="navbar-brand" href="{{route('homepage')}}">
                                <img class="logo-light" src="{{ asset($setting->logo ?? '') }}" alt="logo">
                                <img class="logo-dark" src="{{ asset($setting->logo ?? '') }}" alt="logo"> 
                            </a>
                            <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                                <div class="menu-close d-lg-none">
                                    <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                                </div>
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{route('homepage')}}" class="nav-link {{ Route::is('homepage') ? 'active' : '' }}">
                                            Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('about')}}" class="nav-link">
                                            About Us
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('getProducts')}}" class="nav-link">
                                            Shop
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Pages
                                            <i class="ri-arrow-down-line"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="{{route('faqs')}}" class="nav-link">FAQ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('testimonials')}}" class="nav-link">Testimonials</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('pages',['slug'=>'terms-of-service'])}}" class="nav-link">Terms of Service</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('pages',['slug'=>'privacy-policy'])}}" class="nav-link">Privacy Policy</a>
                                            </li>
                                            <li class="nav-item">
                                                    <a href="{{route('pages',['slug'=>'shipping-policy'])}}" class="nav-link {{ request()->route('slug') == 'shipping-policy' ? 'active' : '' }}">Shipping Policy</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{route('pages',['slug'=>'refund-return-policy'])}}" class="nav-link {{ request()->route('slug') == 'refund-return-policy' ? 'active' : '' }}">Refund & Return Policy</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <li class="nav-item">
                                        <a href="{{route('all-blogs')}}" class="nav-link">
                                            Blog
                                            <!-- <i class="ri-arrow-down-line"></i> -->
                                        </a>
                                        <!-- <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Blog Layout
                                                    <i class="ri-arrow-right-line"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item">
                                                        <a href="blog-no-sidebar.html" class="nav-link">Blog Grid</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="blog-left-sidebar.html" class="nav-link">Blog Left Sidebar</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="blog-right-sidebar.html" class="nav-link">Blog Right Sidebar</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Single Blog
                                                    <i class="ri-arrow-right-line"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item">
                                                        <a href="blog-details-no-sidebar.html" class="nav-link">Blog Details No Sidebar</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="blog-details-left-sidebar.html" class="nav-link">Blog Details Left Sidebar</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="blog-details-right-sidebar.html" class="nav-link">Blog Details Right Sidebar</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul> -->
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('contact')}}" class="nav-link">Contact</a>
                                    </li>
                                    <li class="nav-item d-lg-none">
                                    @if(Auth::check())
                                    <a href="{{ route('userdashboard') }}" class="btn style1 w-block w-100">Account,{{Auth::user()->name}}</a>
                                    @else
                                    <a href="{{ route('login') }}" class="btn style1 w-block w-100">Login Now</a>
                                    @endif
                                    </li>

                                </ul>
                                <div class="other-options md-none">
                                    <div class="option-item">
                                        <button class="searchbtn"><i class="ri-search-line"></i></button>
                                    </div>
                                    <div class="option-item">
                                        <a class="shopcart-btn" href="{{route('cart-details')}}"><i class="flaticon-bag"></i> <span class="cart-count">{{Cart::content()->count()}}</span></a>
                                    </div>
                                    <div class="option-item">
                                    @if(Auth::check())
                                    <a href="{{ route('userdashboard') }}" class="btn style1 w-block w-100">Account,{{Auth::user()->name}}</a>
                                    @else
                                    <a href="{{ route('login') }}" class="btn style1 w-block w-100">Login Now</a>
                                    @endif
                                    </div>
                                    <div class="search-area">
                                        <input type="search" placeholder="Search Here..">
                                        <button type="submit"><i class="ri-search-line"></i></button>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <div class="mobile-bar-wrap d-lg-none">
                            <button class="searchbtn"><i class="ri-search-line"></i></button>
                            <a class="shopcart-btn" href="{{route('cart-details')}}"><i class="flaticon-bag"></i> <span>{{Cart::content()->count()}}</span></a>
                            <div class="mobile-menu d-lg-none">
                                <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                            </div>
                            <div class="search-area">
                                <input type="search" placeholder="Search Here..">
                                <button type="submit"><i class="ri-search-line"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>  