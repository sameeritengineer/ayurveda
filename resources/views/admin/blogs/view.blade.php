@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Single Testimonial</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('adminDash')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('testimonials.index')}}">Single Testimonial</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">

                    <div class="card author-box card-primary">
                        <div class="card-body">
                          <div class="author-box-left">
                            <img class="rounded-circle author-box-picture" width="200px" src="{{ asset($blog->image) }}" alt="Example Image">
                          </div>
                          <div class="author-box-details">
                            <div class="author-box-name">
                                <h5 class="card-title">{{ $blog->name }}</h5>
                            </div>
                            
                            <div class="author-box-job"><b>Category:</b> {{$blog->category->name}}</div>
                            <div class="author-box-description">
                                <b>Description</b>
                                {!! $blog->description !!}
                                <b>Tags</b>
                                {{$final_tags}}
                            </div>
                            <div class="author-box-description">
                                <b>Meta title</b>
                                {{$blog->meta_title}}
                            </div>
                            <div class="author-box-description">
                                <b>Meta description</b>
                                {{$blog->meta_description}}
                            </div>
                            <div class="author-box-description">
                                <b>Meta Keywords</b>
                                {{$blog->meta_keywords}}
                            </div>
                            <div class="buttons">
                                @if($blog->status == 0)
                                <a href="#" class="btn btn-danger">In-Active</a>
                                @else
                                <a href="#" class="btn btn-success">Active</a>
                                @endif
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>   
@endsection
