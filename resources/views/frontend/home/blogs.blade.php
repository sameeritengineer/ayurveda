@extends('frontend.layouts.app')
@section('content')
 <!-- Content Wrapper Start -->
 <div class="content-wrapper">

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap bg-f br-1">
    <div class="container">
        <div class="breadcrumb-title">
            <h2>Blogs</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a href="{{route('homepage')}}">Home</a></li>
                <li>Blog</li>
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
                        <form action="{{url()->current()}}">
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
                <div class="row justify-content-center">
                    @forelse($blogs as $blog)
                    <div class="col-lg-6 col-md-6" >
                        <div class="blog-card style3">
                            <div class="blog-img">
                                <img src="{{ asset($blog->image) }}" alt="Image">
                            </div>
                            <div class="blog-info">
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-calendar-2-line"></i><a href="posts-by-date.html">{{$blog->created_at}}</a></li>
                                    <!-- <li><i class="ri-chat-3-line"></i>No Comment</li> -->
                                </ul>
                                <h3><a href="{{route('single-blog',['slug'=> $blog->slug])}}">{{$blog->name}}</a></h3>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h2>No Blogs</h2>
                    @endforelse

                </div>
                <!-- <ul class="page-nav list-style mt-20">
                    <li><a href="blog-right-sidebar.html"><i class="ri-arrow-left-s-line"></i></a></li>
                    <li><a class="active" href="blog-right-sidebar.html">1</a></li>
                    <li><a href="blog-right-sidebar.html">2</a></li>
                    <li><a href="blog-right-sidebar.html">3</a></li>
                    <li><a href="blog-right-sidebar.html"><i class="ri-arrow-right-s-line"></i></a></li>
                </ul> -->
              <div class="page-nav list-style mt-20">
               {{ $blogs->links('pagination::bootstrap-4') }}
               </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Details Section End -->

</div>
<!-- Content Wrapper End -->
@endsection