@extends('user.layouts.app')
<style>
    .dataTables_wrapper {
    overflow-x: auto;
}

</style>
@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12">
      <div class="dashboard_content mt-2 mt-md-0">
        <h3><i class="far fa-user"></i>
          @if(Route::is('user.orders.index'))
          All Orders
          @elseif(Route::is('user.orders.pending'))
          Pending Orders
          @else
          Completed Orders
          @endif
        </h3>
        <div class="wsus__dashboard_profile">
          <div class="wsus__dash_pro_area">
            {{ $dataTable->table() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
{{ $dataTable->scripts() }}
@endpush
