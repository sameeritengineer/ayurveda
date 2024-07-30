@extends('admin.layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Faq</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.adminDash') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.faqs.index') }}">All Faqs</a></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Faq</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Question</label>
                                    <textarea name="questions" class="form-control">{{ $faq->questions }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea name="answers" class="form-control">{{ $faq->answers }}</textarea>
                                </div>

                                <button type="submmit" class="btn btn-primary">Update</button>
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
