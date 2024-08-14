<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\HomeSectionOne;
use App\Models\HomeSectionTwo;
use App\Models\HomeSectionThree;
use App\Models\HomeSectionFour;
use App\Models\HomeSectionFive;
use App\Models\HomeSectionSix;
use App\Models\Product;

class HomepageController extends Controller
{
    //
   public function index(){
    $setting = Setting::first();
    $testimonials = Testimonial::take(4)->get();
    $blogs = Blog::where('status',1)->take(3)->get();
    $home_section1 = HomeSectionOne::all();
    $home_section2 = HomeSectionTwo::first();
    $home_section3 = HomeSectionThree::first();
    $home_section4_1 = HomeSectionFour::take(3)->get();
    $home_section4_2 = HomeSectionFour::take(3)->skip(3)->get();
    $home_section5 = HomeSectionFive::all();
    $home_section6 = HomeSectionSix::first();
    $products = Product::where('status',1)->where('product_type','top_product')->take(5)->get();
    
    return view('frontend.home.home',compact('setting','testimonials','blogs','home_section1',
            'home_section2','home_section3','home_section4_1','home_section4_2',
            'home_section5','home_section6','products'));
   }

}
