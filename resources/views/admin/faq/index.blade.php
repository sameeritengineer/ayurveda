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
                            <h4>All Faq</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>
                                    Create New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
