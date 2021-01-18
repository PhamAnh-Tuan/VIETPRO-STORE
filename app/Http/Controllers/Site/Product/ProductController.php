<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class ProductController extends Controller
{
    function shop()
    {
        $data['categories'] = Categories::all();
        $data['products'] = Products::paginate(12);
        return view('Site.product.shop', $data);
    }
    function detail($slug)
    {
        $data['new_product'] = Products::orderBy('prd_id', 'desc')->take(4)->get();
        $data['product'] = Products::where('prd_slug', '=', $slug)->first();
        return view('Site.product.detail', $data);
    }
    function finter(Request $request)
    {
        /**
         * https://packagist.org/packages/bumbummen99/shoppingcart
         */
        // echo $request->start;
        // echo '<br>';
        // echo $request->end;
        $price = [$request->start, $request->end];
        $data['categories'] = Categories::all();
        $data['products'] = Products::whereBetween('prd_price', $price)->paginate(10);
        return view('Site.product.shop', $data);
    }
    function productSearch($name,$id){
       
       $data=Products::search($id)->where('prd_id', $id);
       $products=$data->get();
       $categories = Categories::all();
        return view('Site.product.productSearch',compact('products','name','categories'));
    }
    function productSearchSubmit(Request $request){
        $data=Products::search($request->search);
        $products = $data->paginate(5);
        $name=$request->search;
        $categories = Categories::all();
        $string='';
        return view('Site.product.productSearch',compact('products','name','categories'));
    }
}
