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
<!-- Success Message -->
                  @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Danger/Error Message -->
    @if(session('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif     
<div class="col-md-6 grid-margin stretch-card">
                <div class="card">  
                  <div class="card-body">
                    <h4 class="card-title">My Profile</h4>
                    <p class="card-description">Basic Information</p>
                    <form class="forms-sample" action="{{route('user.profileUpdate')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="form-group">
                        <img src="{{Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/ts-2.jpg')}}" alt="img" class="img-fluid w-100">
                        <input type="file" name="image">  
                    </div>    
                      <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name="name" value="{{Auth::user()->name}}">
                        @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="{{Auth::user()->email}}">
                        @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Update</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Password</h4>
                    <form class="forms-sample" action="{{route('user.update.password')}}" method="POST">
                    @csrf
                      <div class="form-group">
                        <label for="CurrentPassword">Current Password</label>
                        <input type="password" class="form-control" id="CurrentPassword" placeholder="Current Password" name="current_password">
                      </div>
                      <div class="form-group">
                        <label for="NewPassword">New Password</label>
                        <input type="password" class="form-control" id="NewPassword" placeholder="New Password" name="password">
                      </div>
                      <div class="form-group">
                        <label for="ConfirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="ConfirmPassword" placeholder="Confirm Password" name="password_confirmation">
                      </div>

                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
              
</div>
@endsection