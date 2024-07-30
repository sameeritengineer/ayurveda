<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;

class BlogpageController extends Controller
{
    //
    public function index(Request $request){
        if($request->has('category')){
            $category = BlogCategory::where('name', $request->category)->firstOrFail();
            $blogs = Blog::where('id',$category->id)->where('status',1)->paginate(6);
        }elseif($request->has('search')){
            $blogs = Blog::where('status',1)
            ->orderBy('id', 'DESC')
            ->where(function ($query) use ($request){
                $query->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('description', 'like', '%'.$request->search.'%');
            })->paginate(6);
        }else{
            $blogs = Blog::where('status',1)->paginate(6);
        }    
        $categories = BlogCategory::get();
        $latestBlogs = Blog::latest()->take(3)->get();
        return view('frontend.home.blogs',compact('blogs','latestBlogs','categories'));
    }

    public function singleblog(string $slug){
        $blog = Blog::where('status',1)->where('slug', $slug)->with('category')->first();
        $blogTags = BlogTag::whereIn('id', explode(',', $blog->tags))->pluck('name');
        $impTag = implode(',', $blogTags->toArray());
        $categories = BlogCategory::get();
        $latestBlogs = Blog::latest()->take(3)->get();
        return view('frontend.home.singleblog',compact('blog','latestBlogs','categories','impTag'));
    }
}
