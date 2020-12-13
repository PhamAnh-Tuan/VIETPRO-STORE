<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('Backend.Product.listproduct');
    }
    function create()
    {
        return view('Backend.Product.addproduct');
    }
    function edit()
    {
        return view('Backend.Product.editproduct');
    }
    function delete()
    {
        return "xoa";
    }
}
