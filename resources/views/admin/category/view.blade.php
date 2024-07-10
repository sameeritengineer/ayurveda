@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Single category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Single category</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">

                    <div class="card author-box card-primary">
                        <div class="card-body">
                          <div class="author-box-left">
                            <img class="rounded-circle author-box-picture" width="200px" src="{{ asset('storage/images/category/'.$category->image) }}" alt="Example Image">
                          </div>
                          <div class="author-box-details">
                            <div class="author-box-name">
                                <h5 class="card-title">{{ $category->cat_name }}</h5>
                            </div>
                            @php
                                            if(!is_null($category->parent_id)){
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
                                                    ->where('categories.id', $category->parent_id)
                                                    ->first();
                                                $parentCategoryName = $category->cat_name;    
                                            }else{
                                                $parentCategoryName = 'No parent Category';
                                            }
                                                
                                                    
                                            @endphp
                            <div class="author-box-job">{{$parentCategoryName}}</div>
                            <div class="author-box-description">
                                {!! $category->description !!}
                            </div>
                            <div class="buttons">
                                @if($category->status == 0)
                                <a href="#" class="btn btn-danger">In-Active</a>
                                @else
                                <a href="#" class="btn btn-success">Active</a>
                                @endif
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>   
@endsection
