<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Blog;

class HomepageController extends Controller
{
    //
   public function index(){
    $setting = Setting::first();
    $testimonials = Testimonial::take(4)->get();
    $blogs = Blog::where('status',1)->take(3)->get();
    return view('frontend.home.home',compact('setting','testimonials','blogs'));
   }

}
