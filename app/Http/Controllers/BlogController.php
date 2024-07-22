<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::with('category')->get();
        return view('admin.blogs.list',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = BlogCategory::get();
        $tags = BlogTag::get();
        $type = 1;
        return view('admin.blogs.add',compact('type','categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        $blog = new Blog;
        $blog->name = $request->name;
        $blog->slug = $request->slug;
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        $blog->tags = implode(',',$request->tags);
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->image =  upload_image('images/blogs/',$request->image);
        if(isset($request->custom_status)){
            $blog->status = $request->custom_status;
        }else{
            $blog->status = 0;
        }
        if($blog->save()){
            return redirect()->route('blogs.index')->with('success', 'Blog Added Successfully.');
        } else {
            return redirect()->route('blogs.index')->with('alert', 'Failed to save Blog. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $blog = Blog::where('id',$id)->with('category')->first();
        $tagsArray =explode(',',$blog->tags);
        $selected_tags = DB::table('blog_tags')->whereIn('id',$tagsArray)->pluck('name')->toArray();
        $final_tags = implode(',',$selected_tags);
        return view('admin.blogs.view',compact('blog','final_tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blog::where('id',$id)->with('category')->first();
        $categories = BlogCategory::get();
        $tags = BlogTag::get();
        $tagsArray =explode(',',$blog->tags);
        $selected_tags = DB::table('blog_tags')->whereIn('id',$tagsArray)->pluck('id')->toArray();
        $type = 2;
        return view('admin.blogs.add',compact('blog','type','categories','tags','selected_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        
        //dd($request->all());
        $blog = Blog::findOrFail($id);
        $blog->name = $request->name;
        $blog->slug = $request->slug;
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        $blog->tags = implode(',',$request->tags);
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        if(isset($request->custom_status)){
            $blog->status = $request->custom_status;
        }else{
            $blog->status = 0;
        }
        if ($request->hasFile('image')) {
            // Delete the old image file from storage if it exists
        if ($blog->image) {
            $filePath = public_path($blog->image);
            File::delete($filePath);
        }
            $blog->image =  upload_image('images/blogs/',$request->image);
        }
        if($blog->save()){
            return redirect()->route('blogs.index')->with('success', 'Blog Updated Successfully.');
        } else {
            return redirect()->route('blogs.index')->with('alert', 'Failed to update Blog. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $delete = $blog->delete();
        if($delete){
            return response()->json(['message' => 'Blog deleted successfully']);
        }else{
            return response()->json(['message' => 'Something Went Wrong']);
        }
    }
}
