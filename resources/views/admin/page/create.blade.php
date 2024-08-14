@extends('admin.layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Page</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.adminDash') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">All Pages</a></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Page</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>


                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control summernote"></textarea>
                                </div>

                                <button type="submmit" class="btn btn-primary">Create</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
@endpush
