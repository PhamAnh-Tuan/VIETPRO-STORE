<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('Backend.Category.category');
    }
    // function create()
    // {
    //     return view('Backend.Product.addproduct');
    // }
    function edit()
    {
        return view('Backend.Category.editcategory');
    }
    function delete()
    {
        return "xoa";
    }
}
