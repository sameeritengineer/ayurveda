@extends('admin.layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Shipping Rule</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.adminDash') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.shippingrules.index') }}">All Shipping Rules</a></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>View Shipping Rule</h4>

                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $shipping->name }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label for="inputState">Type</label>
                                <select id="" class="form-control shipping-type" name="type" disabled>
                                    <option {{ $shipping->type === 'flat_cost' ? 'selected' : '' }} value="flat_cost">
                                        Flat Cost</option>
                                    <option {{ $shipping->type === 'min_cost' ? 'selected' : '' }} value="min_cost">
                                        Minimum Order Amount</option>
                                </select>
                            </div>

                            <div class="form-group min_cost {{ $shipping->type === 'min_cost' ? '' : 'd-none' }}">
                                <label>Minimum Amount</label>
                                <input type="text" class="form-control" name="min_cost" value="{{ $shipping->min_cost }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>Cost</label>
                                <input type="text" class="form-control" name="cost" value="{{ $shipping->cost }}"
                                    readonly>
                            </div>


                            <div class="form-group">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="status" disabled>
                                    <option {{ $shipping->status === 1 ? 'selected' : '' }} value="1">Active
                                    </option>
                                    <option {{ $shipping->status === 0 ? 'selected' : '' }} value="0">Inactive
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
    <script>
        $(document).ready(function() {
            $('body').on('change', '.shipping-type', function() {
                let value = $(this).val();

                if (value != 'min_cost') {
                    $('.min_cost').addClass('d-none')
                } else {
                    $('.min_cost').removeClass('d-none')
                }
            })
        })
    </script>
@endpush
