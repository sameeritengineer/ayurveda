@extends('admin.layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Coupon</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.adminDash') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.coupons.index') }}">All Coupons</a></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>View Coupon</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $coupon->name }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" class="form-control" name="code" value="{{ $coupon->code }}"
                                    readonly>
                            </div>


                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" class="form-control" name="quantity" value="{{ $coupon->quantity }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>Max Use Per Person</label>
                                <input type="text" class="form-control" name="max_use" value="{{ $coupon->max_use }}"
                                    readonly>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="text" class="form-control datepicker" name="start_date"
                                            value="{{ $coupon->start_date }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input type="text" class="form-control datepicker" name="end_date"
                                            value="{{ $coupon->end_date }}" disabled>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputState">Discount Type</label>
                                        <select id="inputState" class="form-control sub-category" name="discount_type"
                                            disabled>
                                            <option {{ $coupon->discount_type == 'percent' ? 'selected' : '' }}
                                                value="percent">Percentage (%)</option>
                                            <option {{ $coupon->discount_type == 'amount' ? 'selected' : '' }}
                                                value="amount">Amount (₹)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Descount Value</label>
                                        <input type="text" class="form-control" name="discount"
                                            value="{{ $coupon->discount }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="status" disabled>
                                    <option {{ $coupon->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $coupon->status == 0 ? 'selected' : '' }} value="0">Inactive
                                    </option>
                                </select>
                            </div>


                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
@endpush
