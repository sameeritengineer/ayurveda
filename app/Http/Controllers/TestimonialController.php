<?php

namespace App\Http\Controllers;

use App\DataTables\TestimonialDataTable;
use App\Models\Testimonial;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TestimonialDataTable $dataTable)
    {
        //
        // $testimonial = Testimonial::latest()->get();
        // return view('admin.testimonials.list',compact('testimonial'));

        return $dataTable->render('admin.testimonials.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $type = 1;
        return view('admin.testimonials.add',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:455',
            'designation' => 'required|string|max:455',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = $this->uploadImage($request, 'image', 'uploads/testimonials');

        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;
        //$testimonial->image =  upload_image('images/testimonials/',$request->image);
        $testimonial->image = $imagePath;
        if($testimonial->save()){
            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial Added Successfully.');
        } else {
            return redirect()->route('admin.testimonials.index')->with('alert', 'Failed to save testimonial. Please try again.');
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
        $testimonial = Testimonial::where('id',$id)->first();
        return view('admin.testimonials.view',compact('testimonial'));
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
        $testimonial = Testimonial::where('id',$id)->first();
        $type = 2;
        return view('admin.testimonials.add',compact('testimonial','type'));
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
            'name' => 'required|string|max:455',
            'designation' => 'required|string|max:455',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $testimonial =  Testimonial::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads/testimonials', $testimonial->image);

        $testimonial->image = empty(!$imagePath) ? $imagePath : $testimonial->image;

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;
        // if ($request->hasFile('image')) {
        //     // Delete the old image file from storage if it exists
        // if ($testimonial->image) {
        //     $filePath = public_path($testimonial->image);
        //     File::delete($filePath);
        // }
        //     $testimonial->image =  upload_image('images/testimonials/',$request->image);
        // }
        if($testimonial->save()){
            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial Updated Successfully.');
        } else {
            return redirect()->route('admin.testimonials.index')->with('alert', 'Failed to update testimonial. Please try again.');
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
        //
        // $testimonial = Testimonial::findOrFail($id);
        // $delete = $testimonial->delete();
        // if($delete){
        //     return response()->json(['message' => 'Testimonials deleted successfully']);
        // }else{
        //     return response()->json(['message' => 'Something Went Wrong']);
        // }

        $testimonial = Testimonial::findOrFail($id);

        $this->deleteImage($testimonial->image);

        $testimonial->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
