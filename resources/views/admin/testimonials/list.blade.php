@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add Testimonial</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.adminDash') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">All Testimonial</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Testimonials</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>Add Testimonials</a>
                            </div>
                        </div>
                        <div class="card-body">

                            {{-- <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonial as $testimonial)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td><img style="border-radius: 30px;" src="{{ asset($testimonial->image) }}" width="60px"></td>
                                        <td>{{ $testimonial->designation }}</td>
                                        <td>
                                            <div class="buttons">
                                                <a href="{{ route('admin.testimonials.show', $testimonial->id) }}"
                                                    class="btn btn-primary">View</a>
                                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-warning">Edit</a>
                                                <button class="btn btn-danger" data-url="{{ route('admin.testimonials.destroy', $testimonial->id) }}" data-confirm="Realy?|Do you want to continue?" data-confirm-yes="YesDeleted({{$testimonial->id}})">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
                            <!-- Pagination Links -->
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var successMessage = {!! json_encode(session('success')) !!};
                iziToast.success({
                    title: '',
                    message: successMessage,
                    position: 'topRight'
                });
            });
        </script>
    @endif --}}
    {{-- <script>
        function YesDeleted(id) {
            var url = "{{ route('admin.testimonials.destroy', ':id') }}".replace(':id', id);
            $.ajax({
                url: url,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    iziToast.success({
                        title: '',
                        message: response.message,
                        position: 'topRight'
                    });
                    window.location.reload();
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                    alert('Error deleting category.');
                }
            });
        }
    </script> --}}
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
