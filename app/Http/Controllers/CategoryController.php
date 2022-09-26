<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Category::all('category_name');
        return view('category.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'category_name' => 'required|unique:categories,category_name',
            'category_photo' => 'image'
        ]);
        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
            'created_at' => Carbon::now()
        ]);

        if ($request->hasFile('category_photo')) {
            // Image upload start
            $image_name = $category_id . "." . $request->file('category_photo')->getClientOriginalExtension();
            Image::make($request->file('category_photo'))->resize(200, 200)->save(base_path('public/uploads/category_photo/' . $image_name));
            // Image upload end
            Category::find($category_id)->update([
                'category_photo' => $image_name
            ]);
        }
        return back()->with('success', 'Category added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // return $category;
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $old_name = $category->category_name;
        $new_name = $request->category_name;
        // $category->update([
        //     'category_name' => $request->category_name
        // ]);
        // option 2
        $category->category_name = $request->category_name;
        $category->save();
        if ($request->hasFile('category_photo')) {
            if ($category->category_photo != 'default_category_photo.jpg') {
                unlink(base_path('/public/uploads/category_photo/' . $category->category_photo));
            }
            // Image upload start
            $image_name = $category->id . "." . $request->file('category_photo')->getClientOriginalExtension();
            Image::make($request->file('category_photo'))->resize(300, 150)->save(base_path('public/uploads/category_photo/' . $image_name));
            // Image upload end
            Category::find($category->id)->update([
                'category_photo' => $image_name
            ]);
        }


        return redirect('category')->with('success', $old_name . ' Category updated to ' . $new_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('delete', 'Category Deleted Successfully');
    }
    public function category_delete(Category $category)
    {
        if ($category->category_photo != 'default_category_photo.jpg') {
            unlink(base_path('/public/uploads/category_photo/' . $category->category_photo));
        }
        $category->forceDelete();
        return back()->with('delete', 'Category Deleted Successfully');
    }
}
