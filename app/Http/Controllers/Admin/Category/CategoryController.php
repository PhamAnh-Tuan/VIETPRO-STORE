<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EditCategoryRequest;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Categories;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Categories::all();
        return view('Backend.Category.category', compact('category'));
    }
    function create(CreateCategoryRequest $request)
    {
        $category = new Categories();
        $category->cat_name = $request->cat_name;
        $category->cat_slug = Str::slug($request->cat_name, '-');
        $category->cat_parent_id = $request->cat_parent_id;
        $category->save();
        return redirect()->route('category.index')->with('thong-bao-them-moi-thanh-cong', 'success');
    }
    function edit($id)
    {
        $data['category'] = Categories::find($id);
        $data['categories'] = Categories::all();
        return view('Backend.Category.editcategory', $data);
    }
    function editPost(EditCategoryRequest $request, $id)
    {
        $category = Categories::find($id);
        $category->cat_name = $request->cat_name;
        $category->cat_parent_id = $request->cat_parent_id;
        $category->cat_slug = Str::slug($request->cat_name, '-');
        $category->save();
<<<<<<< HEAD
        return redirect()->route('category.index')->with('thong-bao-update', 'success');
=======
        return redirect()->route('category.index')->with('thong-bao-categoty-update', 'success');
        
>>>>>>> main
    }
    function delete(Request $request, $id)
    {
        $data = Categories::where('cat_parent_id', '=', $id)->first();
        $category = Categories::find($id);
        if (isset($data)) {
            return "Thư mục cha đang chứa dữ liệu, điều này có thể gây lỗi cho hệ thống";
        } else {
            $category->delete();
        }
        return redirect()->route('category.index')->with('thong-bao-cate-update', 'success');
    }
}
