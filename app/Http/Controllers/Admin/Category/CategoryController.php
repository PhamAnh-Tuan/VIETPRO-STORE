<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index()
    {
        $category=Categories::all();
        return view('Backend.Category.category', compact('category'));
    }
    function create(Request $request)
    {
        $category=new Categories();
        $category->cat_name=$request->cat_name;
        $category->cat_slug = Str::slug($request->cat_name,'-');
        $category->cat_parent_id=$request->cat_parent_id;
        // dd($category);
        $category->save();
        return redirect()->route('category.index')->with('thong-bao','success');
    }
    function edit()
    {
        return view('Backend.Category.editcategory');
    }
    function delete()
    {
        return "xoa";
    }
}
