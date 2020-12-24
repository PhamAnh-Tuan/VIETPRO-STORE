<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;



class SiteController extends Controller
{
    function index()
    {
        $product_featured=Products::where('prd_featured','=','1')->orderBy('prd_id', 'desc')->take(4)->get();
        $product_new=Products::where('prd_state','=','1')->take(4)->get();
        return view('Site.index',compact('product_featured','product_new'));
    }
    function about()
    {
        return view('Site.about');
    }
    function contact()
    {
        return view('Site.contact');
    }
    function product_hot()
    {
        $product=Products::where('prd_state','=','1')->get();
        return view('Site.product.product_nb',compact('product'));
    }
}
