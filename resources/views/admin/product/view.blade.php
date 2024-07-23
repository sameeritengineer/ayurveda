@extends('admin.layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.adminDash') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">All Products</a></div>
            </div>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>View Product</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Preview</label>
                                <br>
                                <img src="{{ asset($product->thumb_image) }}" style="width:200px" alt="">
                            </div>


                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}"
                                    readonly>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputState">Category</label>
                                        <select id="inputState" class="form-control main-category" name="category" disabled>
                                            <option value="">Select</option>
                                            @foreach ($categories as $category)
                                                <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputState">Sub Category</label>
                                        <select id="inputState" class="form-control sub-category" name="sub_category"
                                            disabled>
                                            <option value="">Select</option>
                                            @foreach ($subCategories as $subCategory)
                                                <option
                                                    {{ $subCategory->id == $product->sub_category_id ? 'selected' : '' }}
                                                    value="{{ $subCategory->id }}">{{ $subCategory->cat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>



                            <div class="form-group">
                                <label>SKU</label>
                                <input type="text" class="form-control" name="sku" value="{{ $product->sku }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" value="{{ $product->price }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>Offer Price</label>
                                <input type="text" class="form-control" name="offer_price"
                                    value="{{ $product->offer_price }}" readonly>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer Start Date</label>
                                        <input type="text" class="form-control datepicker" name="offer_start_date"
                                            value="{{ $product->offer_start_date }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer End Date</label>
                                        <input type="text" class="form-control datepicker" name="offer_end_date"
                                            value="{{ $product->offer_end_date }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Stock Quantity</label>
                                <input type="number" min="0" class="form-control" name="qty"
                                    value="{{ $product->qty }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Video Link</label>
                                <input type="text" class="form-control" name="video_link"
                                    value="{{ $product->video_link }}" readonly>
                            </div>


                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="short_description" class="form-control" readonly>{!! $product->short_description !!}</textarea>
                            </div>


                            <div class="form-group">
                                <label>Long Description</label>
                                <textarea name="long_description" class="form-control summernote" readonly>{!! $product->long_description !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="inputState">Product Type</label>
                                <select id="inputState" class="form-control" name="product_type" disabled>
                                    <option value="">Select</option>
                                    <option {{ $product->product_type == 'new_arrival' ? 'selected' : '' }}
                                        value="new_arrival">New Arrival</option>
                                    <option {{ $product->product_type == 'featured_product' ? 'selected' : '' }}
                                        value="featured_product">Featured</option>
                                    <option {{ $product->product_type == 'top_product' ? 'selected' : '' }}
                                        value="top_product">Top Product</option>
                                    <option {{ $product->product_type == 'best_product' ? 'selected' : '' }}
                                        value="best_product">Best Product</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Seo Title</label>
                                <input type="text" class="form-control" name="seo_title"
                                    value="{{ $product->seo_title }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea name="seo_description" class="form-control" readonly>{!! $product->seo_description !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="status" disabled>
                                    <option {{ $product->status == 1 ? 'selected' : '' }} value="1">Active
                                    </option>
                                    <option {{ $product->status == 0 ? 'selected' : '' }} value="0">Inactive
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
