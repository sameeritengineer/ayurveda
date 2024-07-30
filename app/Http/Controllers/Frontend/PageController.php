<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Page;

class PageController extends Controller
{
    //
    public function testimonials(){
        $testimonials = Testimonial::get();
        return view('frontend.home.testimonial',compact('testimonials'));
    }

    public function faqs(){
        $faqs = Faq::get();
        return view('frontend.home.faq',compact('faqs'));

    }

    public function contact(){
        return view('frontend.home.contact');
    }

    public function about(){
        return view('frontend.home.about');
    }

    public function pages(String $slug){
          $page = Page::where('slug',$slug)->first();
          return view('frontend.home.pages',compact('page'));
    }
    
    public function postcontact(Request $request){
       return $request->all();
    }
}
