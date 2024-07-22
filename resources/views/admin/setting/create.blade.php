@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add Setting</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('adminDash')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('create-setting')}}">Add Setting</a></div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">Advanced Forms</h2>
      <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> --}}
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Settings</h4>
                        </div>
                        <div class="card-body">
                            @if($type == 1)
                            <form method="post" action="{{ route('save-setting') }}" enctype="multipart/form-data">
                            @else
                            <form method="post" action="{{route('save-setting', $setting->id)}}" enctype="multipart/form-data">
                            <input type="hidden" name="setting_id" value="{{$setting->id}}">
                            @endif
                            @csrf
                            <div class="form-group">
                                    <label>Banner Title</label>
                                    <input type="text"
                                        class="form-control"
                                        name="title" id="title" value="{{ old('title',$type == 2 ? $setting->title:'') }}">
                            </div>
                            <div class="form-group">
                                <label>Banner Description</label>
                                <input type="text"
                                    class="form-control"
                                    name="description" id="description" value="{{ old('description',$type == 2 ? $setting->description:'') }}">
                            </div>
                            <div class="form-group">
                                <label>Banner Image</label>
                                @if($type == 2)
                                <img width="200px" src="{{ asset($setting->slider_image) }}" alt="Example Image">
                                @endif
                                <input class="form-control"
                                    type="file" name="slider_image">
                            </div>
                            <div class="form-group">
                                <label>Banner Background Color</label>
                                <input type="text"
                                    class="form-control"
                                    name="background_color" id="background_color" value="{{ old('background_color',$type == 2 ? $setting->background_color:'') }}">
                            </div>
                            <div class="form-group">
                                <label>Fav icon</label>
                                @if($type == 2)
                                <img width="200px" src="{{ asset($setting->fav_icon) }}" alt="Example Image">
                                @endif
                                <input class="form-control"
                                    type="file" name="fav_icon">
                            </div>
                            <div class="form-group">
                                <label>Website Logo</label>
                                @if($type == 2)
                                <img width="200px" src="{{ asset($setting->logo) }}" alt="Example Image">
                                @endif
                                <input class="form-control"
                                    type="file" name="logo">
                            </div>
                            <div class="form-group">
                                <label>Website Phone Number</label>
                                <input type="text"
                                    class="form-control"
                                    name="phone" id="phone" value="{{ old('phone',$type == 2 ? $setting->phone:'') }}">
                            </div>
                            <div class="form-group">
                                <label>Website Email</label>
                                <input type="email"
                                    class="form-control"
                                    name="email" id="email" value="{{ old('email',$type == 2 ? $setting->email:'') }}">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text"
                                    class="form-control"
                                    name="address" id="address" value="{{ old('address',$type == 2 ? $setting->address:'') }}">
                            </div>
                            <div class="form-group">
                                <label>Footer Description</label>
                                <input type="text"
                                    class="form-control"
                                    name="footer_description" id="footer_description" value="{{ old('footer_description',$type == 2 ? $setting->footer_description:'') }}">
                            </div>
                            <div class="form-group">
                                <label>Website Right Reserve</label>
                                <input type="text"
                                    class="form-control"
                                    name="right_reserve" id="right_reserve" value="{{ old('right_reserve',$type == 2 ? $setting->footer_description:'') }}">
                            </div>
                            <div class="form-group">
                                <label>Social Links</label>   
                                @if($type == 2)
                                 @php $social = json_decode($setting->social); @endphp
                                @endif
                                <input type="text"
                                    class="form-control"
                                    name="facebook" id="facebook" value="{{ old('facebook',$type == 2 ? $social->facebook:'') }}" placeholder="Facebook Link">
                                <br>
                                    <input type="text"
                                    class="form-control"
                                    name="instagram" id="instagram" value="{{ old('instagram',$type == 2 ? $social->instagram:'') }}" placeholder="Instagram Link">
                                <br>
                                    <input type="text"
                                    class="form-control"
                                    name="twitter" id="twitter" value="{{ old('twitter',$type == 2 ? $social->twitter:'') }}" placeholder="Twitter Link">   
                                <br>
                                    <input type="text"
                                    class="form-control"
                                    name="linkedin" id="linkedin" value="{{ old('linkedin',$type == 2 ? $social->linkedin:'') }}" placeholder="Linkedin Link">     
                            </div>
                        
                                <button type="submit" class="btn btn-primary">Submit</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (session('success') || session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                var message = {!! json_encode(session('success')) !!};
                iziToast.success({
                    title: 'Success',
                    message: message,
                    position: 'topRight'
                });
            @endif

            @if (session('error'))
                var message = {!! json_encode(session('error')) !!};
                iziToast.error({
                    title: 'Error',
                    message: message,
                    position: 'topRight'
                });
            @endif
        });
    </script>
@endif 
@endsection
