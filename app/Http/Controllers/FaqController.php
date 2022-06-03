<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/*==========================================
    =            Author: Media City            =
    Author URI: https://mediacity.co.in
    =            Author: Media City            =
    =            Copyright (c) 2022            =
    ==========================================*/
class FaqController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:faq.view', ['only' => ['index']]);
        $this->middleware('permission:faq.create', ['only' => ['create', 'store', 'ajaxstore']]);
        $this->middleware('permission:faq.edit', ['only' => ['edit', 'update', 'status_update']]);
        $this->middleware('permission:faq.delete', ['only' => ['destroy', 'bulk_delete']]);
    }

    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs'));
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
        if (env('DEMO_LOCK') == 1) {
            return back()->with('deleted', __('This action is disabled in the demo !'));
        }
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $input = $request->all();

        Faq::create($input);
        return back()->with('added', __('Faq has been created'));
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
        if (env('DEMO_LOCK') == 1) {
            return back()->with('deleted', __('This action is disabled in the demo !'));
        }
        $faq = Faq::findOrFail($id);

        $request->validate([
            'question' => 'required',
        ]);

        $input = $request->all();

        $faq->update($input);
        return redirect('admin/faqs')->with('updated', __('Faq has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (env('DEMO_LOCK') == 1) {
            return back()->with('deleted', __('This action is disabled in the demo !'));
        }
        $faq = Faq::findOrFail($id);

        $faq->delete();
        return back()->with('deleted', __('Faq has been deleted'));
    }

    public function bulk_delete(Request $request)
    {
        if (env('DEMO_LOCK') == 1) {
            return back()->with('deleted', __('This action is disabled in the demo !'));
        }
        $validator = Validator::make($request->all(), [
            'checked' => 'required',
        ]);

        if ($validator->fails()) {

            return back()->with('deleted', __('Please select one of them to delete'));
        }

        foreach ($request->checked as $checked) {

            Faq::destroy($checked);
        }

        return back()->with('deleted', __('Faqs has been deleted'));
    }
}
