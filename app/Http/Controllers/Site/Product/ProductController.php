<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\Products;
use App\Models\Categories;

class ProductController extends Controller
{
    function shop()
    {
        $categories = Categories::all();
        return view('Site.product.shop', compact('categories'));
    }
    function detail()
    {
        return view('Site.product.detail');
    }
    
}
