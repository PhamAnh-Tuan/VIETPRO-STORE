<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Stripe\Product;

class SiteController extends Controller
{
    function index()
    {
        // $product_featured=Products::where('prd_featured','=','1')->orderBy('prd_id', 'desc')->take(4)->get();
        // $product_new=Products::where('prd_state','=','1')->take(4)->get();
        // $data['new_product']=Products::orderBy('prd_id','desc')->skip()->take(8)->get();
        $data['new_product']=Products::orderBy('prd_id','desc')->take(8)->get();
        $data['feature_product']=Products::where('prd_featured',1)->take(4)->get();;

        return view('Site.index',$data);
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
    function findByCategory($slug)
    {
        $category=Categories::where('cat_slug',$slug)->first();
        /**
         * https://stackoverflow.com/questions/28223289/difference-between-method-calls-model-relation-and-model-relation
         * Productsss -> them () vi co phuong thuc tiep theo (paginate) ----> tra ve phuong thuc
         * Productsss -> tra ve ket qua (da la ket qua cuoi cung)
         */
        $product=$category->Productsss()->paginate(10);
        $data['products']=$product;
        $data['categories']=Categories::all();
        return view('Site.product.shop',$data);

    }
}
