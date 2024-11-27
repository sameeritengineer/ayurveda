@extends('user.layouts.app')

@section('content')
<div class="row">
    <!-- Display All Errors -->
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @alert

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $type == 1 ? 'Add Address' : 'Edit Address' }}</h4>

                <form class="forms-sample" action="{{ $type == 1 ? route('user.address-store') : route('user.address-update',$address->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($type == 2)
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name', $address->name ?? '') }}">
                        @validationErr('name')
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email', $address->email ?? '') }}">
                        @validationErr('email')
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ old('phone', $address->phone ?? '') }}">
                        @validationErr('phone')
                    </div>
                    <input type="hidden" value="India" name="country">
                    {{-- <div class="form-group d-none">
                        <label for="country">Country</label>
                        <select class="form-control" id="country" name="country" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->name }}"  data-id = "{{ $country->id}}" {{ old('country', $address->country ?? '') == $country->name ? 'selected' : '' }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @validationErr('country')
                    </div> --}}

                    <div class="form-group">
                        <label for="state">State</label>
                        <select class="form-control" id="state" name="state" required>
                            <option value="">Select State</option>
                            @if(isset($states))
                                @foreach($states as $state)
                                    <option value="{{ $state->name }}" data-id = "{{ $state->id}}" {{ old('state', $address->state ?? '') == $state->name ? 'selected' : '' }}>{{ $state->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @validationErr('state')
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <select class="form-control" id="city" name="city" required>
                            <option value="">Select City</option>
                            @if(isset($cities))
                                @foreach($cities as $city)
                                    <option value="{{ $city->name }}"  data-id = "{{ $city->id}}" {{ old('city', $address->city ?? '') == $city->name ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @validationErr('city')
                    </div>
                    <div class="form-group">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="Zip" name="zip" value="{{ old('zip', $address->zip ?? '') }}">
                        @validationErr('zip')
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" placeholder="Address" name="address">{{ old('address', $address->address ?? '') }}</textarea>
                        @validationErr('address')
                    </div>

                    <button type="submit" class="btn btn-primary me-2">{{ $type == 1 ? 'Add Address' : 'Update Address' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#country').on('change', function() {
            var country_id = $(this).find('option:selected').data('id');
            if(country_id) {
                $.ajax({
                    url: '{{ route("user.get-states", ":country_id") }}'.replace(':country_id', country_id),
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#state').empty();
                        $('#state').append('<option value="">Select State</option>');
                        $.each(data, function(key, value) {
                            $('#state').append('<option value="'+ value.name +'" data-id="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('#state').empty();
                $('#city').empty();
            }
        });

        $('#state').on('change', function() {
            var state_id = $(this).find('option:selected').data('id');
            if(state_id) {
                $.ajax({
                    url: '{{ route("user.get-cities", ":state_id") }}'.replace(':state_id', state_id),
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#city').empty();
                        $('#city').append('<option value="">Select City</option>');
                        $.each(data, function(key, value) {
                            $('#city').append('<option value="'+ value.name +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('#city').empty();
            }
        });
    });
</script>
@endpush
