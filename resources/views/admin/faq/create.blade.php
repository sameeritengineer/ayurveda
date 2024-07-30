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
                            <h4>Create Faq</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.faqs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Question</label>
                                    <textarea name="questions" class="form-control"></textarea>
                                </div>


                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea name="answers" class="form-control"></textarea>
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
