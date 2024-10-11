@extends('frontend.layouts.app')
@section('content')
            <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f banner_blogs">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2 style="color:#fff">Blog Details</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="{{route('homepage')}}" style="color:#fff">Home</a></li>
                                <li><a href="{{route('all-blogs')}}" style="color:#fff">Blog</a></li>
                                <li style="color:#fff">Blog Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- Blog Details Section Start -->
                <div class="blog-details-wrap ptb-100">
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-xl-4 col-lg-12 order-xl-1 order-lg-2 order-md-2 order-2">
                                <div class="sidebar">
                                    <div class="sidebar-widget">
                                        <div class="search-box">
                                        <form action="{{route('all-blogs')}}">
                                            <div class="form-group">
                                                <input type="search" name="search" placeholder="Search">
                                                <button type="submit"> 
                                                    <i class="flaticon-search"></i>
                                                </button>
                                            </div>
                                        </form>    
                                        </div>
                                    </div>
                                    <div class="sidebar-widget popular-post">
                                        <h4>Recent Posts</h4>
                                        <div class="popular-post-widget">
                                        @foreach($latestBlogs as $lblog)
                            <div class="pp-post-item">
                                <a href="{{route('single-blog',['slug'=> $lblog->slug])}}" class="pp-post-img">
                                    <img src="{{ asset($lblog->image) }}" alt="Image">
                                </a>
                                <div class="pp-post-info">
                                    <span>{{$lblog->created_at}}</span>
                                    <h6>
                                        <a href="{{route('single-blog',['slug'=> $lblog->slug])}}">
                                        {{$lblog->name}}
                                        </a>
                                    </h6>
                                </div>
                            </div>
                        @endforeach  
                                        </div>
                                    </div>
                                    <div class="sidebar-widget categories">
                                        <h4>Categories</h4>
                                        <ul class="category-box list-style">
                        @foreach($categories as $cat)
                            <li>
                                <a href="{{route('all-blogs', ['category' => $cat->name])}}">
                                    <i class="ri-checkbox-line"></i>
                                    {{$cat->name}}
                                </a>
                            </li>
                        @endforeach
                                        </ul>
                                    </div>
                                    <!-- <div class="sidebar-widget tags">
                                        <h4>Popular Tags </h4>
                                        <div class="tag-list">
                                            <ul class="list-style">
                                                <li><a href="posts-by-tag.html">Health</a></li>
                                                <li><a href="posts-by-tag.html">Medicine</a></li>
                                                <li><a href="posts-by-tag.html">Cannbis</a></li>
                                                <li><a href="posts-by-tag.html">Marijuanna</a></li>
                                                <li><a href="posts-by-tag.html">Doctor</a></li>
                                                <li><a href="posts-by-tag.html">Herbal</a></li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <div class="sidebar-widget contact-widget">
                                        <h3>How We Can Help You</h3>
                                        <p>Lorem ipsum dolor sit amet consec tetur adipcing elit. Voluptate quib ausd possq imus voluptem.</p>
                                        <a href="contact.html" class="btn style1">Contact us</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-12 order-xl-2 order-lg-1 order-md-1 order-1">
                                <article>
                                    <div class="post-img">
                                        <img src="{{ asset($blog->image) }}" alt="Image">
                                    </div>
                                 {!! $blog->description !!}
                                </article>
                                <div class="post-meta-option">
                                    <div class="row gx-0 align-items-center">
                                        <div class="col-md-7 col-12">
                                            <div class="post-tag">
                                                <span>Tags: <tag class="tag-list style2 list-style">{{$impTag}}</tag></span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12 text-md-end text-start">
                                            <div class="post-share w-100">
                                                <span>Share:</span>
                                                <ul class="social-profile style2 list-style">
                                                    <li>
                                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('single-blog',['slug'=> $blog->slug])}}
">
                                                            <i class="ri-facebook-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a target="_blank" href="https://twitter.com/intent/tweet?url={{route('single-blog',['slug'=> $blog->slug])}}&text={{$blog->name}}
">
                                                            <i class="ri-twitter-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="post-author">
                                    <div class="post-author-img">
                                        <img src="assets/img/testimonials/client-1.jpg" alt="Image">
                                    </div>
                                    <div class="post-author-info">
                                        <h4>Elon Musk</h4>
                                        <p>Claritas est etiam amet sinicus, qui sequitur lorem ipsum semet coui lectorum. Lorem ipsum dolor voluptatem corporis blanditiis sadipscing elitr sed diam nonumy eirmod amet sit lorem.</p>
                                        <ul class="social-profile style3 list-style">
                                            <li>
                                                <a target="_blank" href="https://facebook.com">
                                                    <i class="ri-facebook-line"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="https://twitter.com">
                                                    <i class="ri-twitter-line"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="https://linkedin.com">
                                                    <i class="ri-linkedin-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                                <!-- <div class="comment-box-title mb-30">
                                    <h4><span>3</span> Comments</h4>
                                </div>
                                <div class="comment-item-wrap">
                                    <div class="comment-item">
                                        <div class="comment-author-img">
                                            <img src="assets/img/testimonials/client-2.jpg" alt="mage">
                                        </div>
                                        <div class="comment-author-wrap">
                                            <div class="comment-author-info">
                                                <div class="row align-items-start">
                                                    <div class="col-md-9 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                                                        <div class="comment-author-name">
                                                            <h5>Alivic Dsuza <span class="comment-date">Jun 22, 2024</span></h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-3">
                                                        <a href="#cmt-form" class="reply-btn">Reply</a>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-2">
                                                        <div class="comment-text">
                                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                                            sed diam nonumy eirmod  tempor invidunt ut labore et dolore
                                                            magna aliquyam erat.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-item reply">
                                        <div class="comment-author-img">
                                            <img src="assets/img/testimonials/client-6.jpg" alt="mage">
                                        </div>
                                        <div class="comment-author-wrap">
                                            <div class="comment-author-info">
                                                <div class="row align-items-start">
                                                    <div class="col-md-9 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                                                        <div class="comment-author-name">
                                                            <h5>Everly Leah <span class="comment-date">Jun 23, 2024</span></h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-3">
                                                        <a href="#cmt-form" class="reply-btn">Reply</a>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-2">
                                                        <div class="comment-text">
                                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                                            sed diam nonumy eirmod  tempor invidunt ut labore et dolore
                                                            magna aliquyam erat.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-item">
                                        <div class="comment-author-img">
                                            <img src="assets/img/testimonials/client-4.jpg" alt="mage">
                                        </div>
                                        <div class="comment-author-wrap">
                                            <div class="comment-author-info">
                                                <div class="row align-items-start">
                                                    <div class="col-md-9 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                                                        <div class="comment-author-name">
                                                            <h5>Michel Jackson <span class="comment-date">Jun 15, 2024</span></h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-3">
                                                        <a href="#cmt-form" class="reply-btn">Reply</a>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-2">
                                                        <div class="comment-text">
                                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                                            sed diam nonumy eirmod  tempor invidunt ut labore et dolore
                                                            magna aliquyam erat.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="cmt-form">
                                    <div class="comment-box-title mb-25">
                                        <h4>Leave A Comment</h4>
                                        <p>Your email address will not be published. Required fields are marked.</p>
                                    </div>
                                    <form action="#" class="comment-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="name" id="name" required placeholder="Name*">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" required placeholder="Email Address*">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="url" name="website" id="website" placeholder="Website">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea name="messages" id="messages" cols="30" rows="10" placeholder="Please Enter Your Comment Here"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" type="checkbox" id="test_2"
                                                    >
                                                    <label class="form-check-label" for="test_2">
                                                        Save my info for the next time I commnet.
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn style1">Post A Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Details Section End -->

            </div>
            <!-- Content Wrapper End -->
@endsection