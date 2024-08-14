<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\HomeSectionOne;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

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
        $home_section1 = HomeSectionOne::all();
        $testimonials = Testimonial::take(4)->get();
        return view('frontend.home.about',compact('home_section1','testimonials'));
    }

    public function pages(String $slug){
          $page = Page::where('slug',$slug)->first();
          return view('frontend.home.pages',compact('page'));
    }
    
    public function postcontact(Request $request){
    //    return $request->all();
          $contact = new Contact;
          $contact->name = $request->name;
          $contact->email = $request->email;
          $contact->phone = $request->phone_number;
          $contact->subject = $request->msg_subject;
          $contact->message = $request->message;
          $data = $contact->save();

          if($data){
            $toEmail = 'sameer.ece564@gmail.com';
            $emailData = $request->all();
            Mail::to($toEmail)->send(new ContactMail($emailData));
            return response(['status' => 'success']);
          }else{
            return response(['status' => 'error']);
          }
          
    }

    public function newsletter(Request $request){
       // Check if the email already exists
       $emailExists = Newsletter::where('email', $request->email)->exists();

       if ($emailExists) {
           return response()->json([
               'status' => 'exists',
               'message' => 'This email is already subscribed.',
           ]);
       }

       // Save the email to the database
       Newsletter::create([
           'email' => $request->email,
       ]);

       return response()->json([
           'status' => 'success',
           'message' => 'Thank you for subscribing!',
       ], 200);
    }
}
