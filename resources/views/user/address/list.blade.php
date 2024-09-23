@extends('user.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12">
        @alert
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('user.address-add') }}" class="btn btn-primary">Add Address</a>
        </div>
        <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> All Addresses</h3>
            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <!-- Render the DataTable -->
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<!-- Render the DataTable scripts -->
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            });


            $('body').on('click', '.delete-item', function(event) {
                event.preventDefault();
                let deleteUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,

                            success: function(data) {

                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload();
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Cant Delete',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })
                    }
                })
            })

        })
    </script>

@endpush
