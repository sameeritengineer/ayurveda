<?php

namespace App\Http\Controllers;

use App\DataTables\FaqDataTable;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use Str;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FaqDataTable $dataTable)
    {
        return $dataTable->render('admin.faq.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
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
            'questions' => ['required'],
            'answers' => ['required']
        ]);

        $faq = new Faq();
        $faq->questions = $request->questions;
        $faq->answers = $request->answers;

        $faq->save();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::findOrFail($id);

        return view('admin.faq.view', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
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
        $request->validate([
            'questions' => ['required'],
            'answers' => ['required']
        ]);

        $faq = Faq::findOrFail($id);

        $faq->questions = $request->questions;
        $faq->answers = $request->answers;
        $faq->save();

        return redirect()->route('admin.faqs.index')->with('success', 'Faq Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
