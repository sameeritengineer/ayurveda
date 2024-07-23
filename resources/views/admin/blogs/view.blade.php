@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>View Blogs</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.adminDash') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">All Blogs</a></div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">Advanced Forms</h2>
      <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> --}}
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>View Blog</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Preview</label>
                                <br>
                                <img src="{{ asset($blog->image) }}" style="width:200px" alt="">
                            </div>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $blog->name }}" readonly>

                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    value="{{ $blog->slug }}" readonly>

                            </div>
                            <div class="form-group">
                                <label>Select category</label>
                                <select class="form-control" name="category_id" disabled>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $cats)
                                        <option value="{{ $cats->id }}"
                                            {{ $cats->id == $blog->category->id ? 'selected' : '' }}>
                                            {{ $cats->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Blog Tags</label>
                                @foreach ($tags as $tag)
                                    <div>
                                        <input type="checkbox" id="tag-{{ $tag->id }}" name="tags[]"
                                            value="{{ $tag->id }}" @if (in_array($tag->id, $selected_tags)) checked @endif
                                            disabled>
                                        <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="ckeditor form-control custometexareaproduct custom-control" readonly>
    {{ old('description', $blog->description) }}
</textarea>

                            </div>
                            <div class="form-group">
                                <label for="meta_title">Meta Title:</label>
                                <input class="form-control" type="text" id="meta_title" name="meta_title"
                                    value="{{ $blog->meta_title }}" maxlength="60" readonly>
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description:</label>
                                <input class="form-control" type="text" id="meta_description" name="meta_description"
                                    value="{{ $blog->meta_description }}" maxlength="160" readonly>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords:</label>
                                <input class="form-control" type="text" id="meta_keywords" name="meta_keywords"
                                    value="{{ $blog->meta_keywords }}" maxlength="255" readonly>
                            </div>
                            <div class="form-group">
                                <div class="control-label">Toggle switch single</div>
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" value="{{ $blog->status == 1 ? 1 : 0 }}" name="custom_status"
                                        class="custom-switch-input" {{ $blog->status == 1 ? 'checked' : '' }} readonly>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Status</span>
                                </label>
                            </div>


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
