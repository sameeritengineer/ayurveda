@extends('user.layouts.app')
@section('content')
<div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome John</h3>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin transparent">
                <div class="row">
                  <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                      <a class="nav-link" href="{{route('user.orders.index')}}">
                      <div class="card-body">
                        <p class="mb-4">Total Order</p>
                        <p class="fs-30 mb-2">4006</p>
                      </div>
                    </a>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                    <a class="nav-link" href="{{route('user.orders.pending')}}">  
                      <div class="card-body">
                        <p class="mb-4">Pending Orders</p>
                        <p class="fs-30 mb-2">61344</p>
                      </div>
                    </a>  
                    </div>
                  </div>
                  <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-light-danger">
                    <a class="nav-link" href="{{route('user.orders.completed')}}">  
                      <div class="card-body">
                        <p class="mb-4">Completed Orders</p>
                        <p class="fs-30 mb-2">61344</p>
                      </div>
                    </a>  
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                    <a class="nav-link" href="{{route('user.review')}}">  
                      <div class="card-body">
                        <p class="mb-4">Reviews</p>
                        <p class="fs-30 mb-2">34040</p>
                      </div>
                    </a>  
                    </div>
                  </div>
                  <div class="col-md-4 stretch-card transparent">
                    <div class="card card-light-danger">
                    <a class="nav-link" href="{{route('user.profile')}}">  
                      <div class="card-body">
                        <p class="mb-4">My Profile</p>
                      </div>
                    </a>  
                    </div>
                  </div>
                  <div class="col-md-4 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                      <div class="card-body">
                        <p class="mb-4">Addresses</p>
                        <p class="fs-30 mb-2">3</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection            