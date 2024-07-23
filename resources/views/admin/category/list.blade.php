@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add Categories</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">All categories</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="buttons">
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Parent Category</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $cats)
                                        <tr>
                                            @php
                                                if (!is_null($cats->parent_id)) {
                                                    $category = \App\Models\Category::select(
                                                        'categories.*',
                                                        'parent.cat_name as parent_name',
                                                    )
                                                        ->leftJoin(
                                                            'categories as parent',
                                                            'categories.parent_id',
                                                            '=',
                                                            'parent.id',
                                                        )
                                                        ->where('categories.id', $cats->parent_id)
                                                        ->first();
                                                    $parentCategoryName = $category->cat_name;
                                                } else {
                                                    $parentCategoryName = 'No parent';
                                                }

                                            @endphp
                                            <th scope="row">{{ $cats->id }}</th>
                                            <td>{{ $cats->cat_name }}</td>
                                            <td>{{ $parentCategoryName }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($cats->description, 30, $end = '...') }}
                                            </td>
                                            <td>
                                                <div class="buttons">
                                                    <a href="{{ route('admin.categories.show', $cats->id) }}"
                                                        class="btn btn-primary">View</a>
                                                    <a href="{{ route('admin.categories.edit', $cats->id) }}" class="btn btn-warning">Edit</a>
                                                    <button class="btn btn-danger" data-url="{{ route('admin.categories.destroy', $cats->id) }}" data-confirm="Realy?|Do you want to continue?" data-confirm-yes="YesDeleted({{$cats->id}})">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Pagination Links -->
                            <div class="card-body">
                                {{ $categories->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (session('success'))
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
    @endif
    <script>
       function YesDeleted(id){
            var url = "{{ route('admin.categories.destroy', ':id') }}".replace(':id', id);
            $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        iziToast.success({
                        title: '',
                        message: response.message,
                        position: 'topRight'
                    });
                        window.location.reload();
                    },
                    error: function (xhr) {
                        console.error('Error:', xhr.responseText);
                        alert('Error deleting category.');
                    }
                });
       }  
    </script>
@endsection
