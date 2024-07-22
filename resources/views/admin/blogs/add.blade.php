@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add Blogs</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('adminDash')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('blogs.create')}}">Add Blogs</a></div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">Advanced Forms</h2>
      <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> --}}
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Blog</h4>
                        </div>
                        <div class="card-body">
                            @if($type == 1)
                            <form method="post" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                            @else
                            <form method="post" action="{{route('blogs.update', $blog->id)}}" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            <input type="hidden" name="blog_id" value="{{$blog->id}}">
                            @endif
                            @csrf
                            <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('name')) is-invalid @endif"
                                        name="name" id="name" value="{{ old('name',$type == 2 ? $blog->name:'') }}">
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text"
                                    class="form-control @if ($errors->has('slug')) is-invalid @endif"
                                    name="slug" id="slug" value="{{ old('slug',$type == 2 ? $blog->slug:'') }}">
                                @if ($errors->has('slug'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('slug') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Select category</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $cats)
                                        <option value="{{ $cats->id }}" {{ $type == 2 &&  $cats->id == $blog->category->id ? 'selected' : '' }}>{{ $cats->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category_id') }}
                                </div>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Blog Tags</label>
                                @foreach($tags as $tag)
                            <div>
                                <input type="checkbox" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" @if(in_array($tag->id, $selected_tags)) checked @endif>
                                <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                            </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    @if($type == 2)
                                    <img width="200px" src="{{ asset($blog->image) }}" alt="Example Image">
                                    @endif
                                    <input class="form-control @if ($errors->has('image')) is-invalid @endif"
                                        type="file" name="image">
                                    @if ($errors->has('image'))
                                        <div class="img-invalid-feedback">
                                            {{ $errors->first('image') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" value="{{ old('description') }}"
                                        class="@if ($errors->has('description')) is-invalid @endif ckeditor form-control custometexareaproduct custom-control">
                                    {{ $type == 2 ? $blog->description : '' }}
                                    </textarea>
                                    @if ($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="meta_title">Meta Title:</label>
                                    <input class="form-control" type="text" id="meta_title" name="meta_title" value="{{ old('meta_title',$type == 2 ? $blog->meta_title:'') }}"  maxlength="60">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description:</label>
                                    <input class="form-control" type="text" id="meta_description" name="meta_description" value="{{ old('meta_description',$type == 2 ? $blog->meta_description:'') }}" maxlength="160">
                                </div>
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords:</label>
                                    <input class="form-control" type="text" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords',$type == 2 ? $blog->meta_keywords:'') }}" maxlength="255">
                                </div>
                                <div class="form-group">
                                    <div class="control-label">Toggle switch single</div>
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" value="{{ $type == 2 && $blog->status == 1 ? 1 : 0 }}" name="custom_status"
                                            class="custom-switch-input" {{ $type == 2 && $blog->status == 1 ? 'checked' : '' }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Status</span>
                                    </label>
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
            $(document).ready(function() {
                $('#name').on('input', function() {
                    var title = $(this).val();
                    var slug = generateSlug(title);
                    $('#slug').val(slug);
                });
            });
            $('input[name="custom_status"]').change(function() {
                if (this.checked) {
                    $(this).val(1);
                } else {
                    $(this).val(0);
                }
            });
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
