@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>View Testimonial</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('adminDash') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('testimonials.index') }}">All Testimonial</a></div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">Advanced Forms</h2>
      <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> --}}
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>View Testimonial</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Preview</label>
                                <br>
                                <img src="{{ asset($testimonial->image) }}" style="width:200px" alt="">
                            </div>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $testimonial->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation" id="designation"
                                    value="{{ $testimonial->designation }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" value="{{ old('description') }}"
                                    class="ckeditor form-control custometexareaproduct custom-control" readonly>
                                    {{ $testimonial->description }}
                                    </textarea>
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
