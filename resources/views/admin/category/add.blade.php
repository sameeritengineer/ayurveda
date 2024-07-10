@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add Categories</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Add categories</a></div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">Advanced Forms</h2>
      <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> --}}
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Categories & Sub-Categories</h4>
                        </div>
                        <div class="card-body">
                            @if($type == 1)
                            <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                            @else
                            <form method="post" action="{{route('categories.update', $category->id)}}" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            @endif
                            @csrf
                            <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('cat_name')) is-invalid @endif"
                                        name="cat_name" id="cat_name" value="{{ old('cat_name',$type == 2 ? $category->cat_name:'') }}">
                                    @if ($errors->has('cat_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('cat_name') }}
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label>Category Slug</label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('cat_slug')) is-invalid @endif"
                                        name="cat_slug" id="cat_slug" value="{{ old('cat_slug',$type == 2 ? $category->cat_slug:'') }}">
                                    @if ($errors->has('cat_slug'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('cat_slug') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Select Parent category</label>
                                    <select class="form-control" name="parent_cat_id">
                                        <option value="">Select Parent Category</option>
                                        @foreach ($categories as $cats)
                                            <option value="{{ $cats->id }}" {{ $type == 2 &&  $cats->id == $category->parent_id ? 'selected' : '' }}>{{ $cats->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea name="description" value="{{ old('description') }}"
                                        class="@if ($errors->has('description')) is-invalid @endif ckeditor form-control custometexareaproduct custom-control">
                                    {{ $type == 2 ? $category->description : '' }}
                                    </textarea>
                                    @if ($errors->has('cat_slug'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Category Image</label>
                                    @if($type == 2)
                                    <img width="200px" src="{{ asset('storage/images/category/'.$category->image) }}" alt="Example Image">
                                    @endif
                                    <input class="form-control @if ($errors->has('description')) is-invalid @endif"
                                        type="file" name="cat_image">
                                    @if ($errors->has('cat_image'))
                                        <div class="img-invalid-feedback">
                                            {{ $errors->first('cat_image') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="control-label">Toggle switch single</div>
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" value="{{ $type == 2 && $category->status == 1 ? 1 : 0 }}" name="custom_status"
                                            class="custom-switch-input" {{ $type == 2 && $category->status == 1 ? 'checked' : '' }}>
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
                $('#cat_name').on('input', function() {
                    var title = $(this).val();
                    var slug = generateSlug(title);
                    $('#cat_slug').val(slug);
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
