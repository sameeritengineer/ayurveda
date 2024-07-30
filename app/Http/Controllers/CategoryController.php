<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $data;
    public function __construct(CategoryService $catService)
    {
        $this->data = $catService;
    }
    public function index()
    {
        //
        $categories = $this->data->get();
        return view('admin.category.list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
        $categories = $this->data->create();
        $type = 1;
        return view('admin.category.add',compact('categories','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $request->validated();
        $result = $this->data->store($request->all());
        if($result){
            return redirect()->route('admin.categories.index')->with('success', 'Category Added Successfully.');
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
        $category = $this->data->show($id);
        return view('admin.category.view',compact('category'));
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
        $category = Category::findOrFail($id);
        $categories = $this->data->create();
        $type = 2;
        return view('admin.category.add',compact('category','categories','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request)
    {
        //
        $request->validated();
        $result = $this->data->update($request->all());
        if($result){
            return redirect()->route('admin.categories.index')->with('success', 'Category Updated Successfully.');
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
        $data = $this->data->delete($id);
        if($data){
            return response()->json(['message' => 'Category deleted successfully']);
        }else{
            return response()->json(['message' => 'Something Went Wrong']);
        }
        
    }
}
