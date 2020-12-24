<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\Products;

class ProductController extends Controller
{
    function shop()
    {
        return view('Site.product.shop');
    }
    function detail()
    {
        return view('Site.product.detail');
    }
    
}
