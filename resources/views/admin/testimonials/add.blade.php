@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add Testimonial</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('adminDash')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('testimonials.create')}}">Add Testimonial</a></div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">Advanced Forms</h2>
      <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> --}}
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Testimonial</h4>
                        </div>
                        <div class="card-body">
                            @if($type == 1)
                            <form method="post" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
                            @else
                            <form method="post" action="{{route('testimonials.update', $testimonial->id)}}" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            <input type="hidden" name="testimonial_id" value="{{$testimonial->id}}">
                            @endif
                            @csrf
                            <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('name')) is-invalid @endif"
                                        name="name" id="name" value="{{ old('name',$type == 2 ? $testimonial->name:'') }}">
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('designation')) is-invalid @endif"
                                    name="designation" id="designation" value="{{ old('designation',$type == 2 ? $testimonial->designation:'') }}">
                                @if ($errors->has('designation'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('designation') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" value="{{ old('description') }}"
                                        class="@if ($errors->has('description')) is-invalid @endif ckeditor form-control custometexareaproduct custom-control">
                                    {{ $type == 2 ? $testimonial->description : '' }}
                                    </textarea>
                                    @if ($errors->has('cat_slug'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    @if($type == 2)
                                    <img width="200px" src="{{ asset($testimonial->image) }}" alt="Example Image">
                                    @endif
                                    <input class="form-control @if ($errors->has('image')) is-invalid @endif"
                                        type="file" name="image">
                                    @if ($errors->has('image'))
                                        <div class="img-invalid-feedback">
                                            {{ $errors->first('image') }}
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('.ckeditor'), {
                    // Set editor width and height
                    width: '100%', // Adjust as needed
                    height: '700px', // Adjust as needed
                })
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
