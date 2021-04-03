<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category_index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        if ($category->save()){

        if ($request->hasFile('icon')){
            $MimeType = explode("/", $request->file('icon')->getMimeType());
            $filename = "C-" . $category->id . "-" . time() . '.' . $MimeType[1];
            $path = public_path('/uploads/icons/'.$filename);
            $uploaded_icon = Image::make($request->file('icon'))->save($path);
            $category->icon = '/uploads/icons/'.$filename;
            $category->save();
        }
        return redirect()->route('categories.index');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function topic(Request $request,Category $category)
    {

        if (isset($request->from) && isset($request->to)) {
            $from = $request->from;
            $to = $request->to;
            return view('topic',compact('from','to','category'));
        }
        return view('topic',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category_edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
       $category->name = $request->name;
        if ($category->save()){

            if ($request->hasFile('icon')){
                $MimeType = explode("/", $request->file('icon')->getMimeType());
                $filename = "C-" . $category->id . "-" . time() . '.' . $MimeType[1];
                $path = public_path('/uploads/icons/'.$filename);
                $uploaded_icon = Image::make($request->file('icon'))->save($path);
                $category->icon = '/uploads/icons/'.$filename;
                $category->save();
            }
            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $category)
    {
        if ($category->delete()){
            return redirect()->route('categories.index');
        }
    }
}
