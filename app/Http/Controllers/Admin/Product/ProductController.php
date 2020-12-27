<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    public function index()
    {
        $product = Products::all();
        return view('Backend.Product.listproduct', compact('product'));
    }
    function create()
    {
        $categories = Categories::all();
        // $data['catelist']=Categories::all();
        return view('Backend.Product.addproduct', compact('categories'));
    }
    /** CreateProductRequest
     * Nếu Yc thêm nhiều danh mục -> xóa khóa ngoại bảng products, vì sử dụng attack cần có khóa ID product ->xóa khóa ngoại bảng product để có ID new product
     */
    function createPOST( Request $request)
    {
        $request->validate(
            [
                'image' => 'required|image|mimes:jfif,jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            ]
        );
        $product                    = new Products();
        $product->prd_name          = $request->name;
        $product->prd_code          = $request->code;
        $product->prd_price         = $request->price;
        $product->prd_featured      = $request->featured;
        $product->prd_state         = $request->state;
        $product->prd_info          = $request->info;
        $product->prd_describer     = $request->describer;
        $product->prd_slug          = Str::slug($request->name, '-');
        $product->prd_image         = $request->file('image')->getClientOriginalName();
        $image                      = $request->file('image');
        $name                       = $image->getClientOriginalName();
        $destinationPath            = public_path('/Backend/img/product');
        $image->move($destinationPath, $name);
        /** Chưa xóa khóa vì project là 1-n
         * Vòng foreach ghi đè cat_id 
         */ 
        foreach ($request->cat_id as $approver) {
            $product->cat_id = $approver;
        }
        $product->save();
       $product->categoryy()->attach($request->cat_id);
        return redirect()->route('product.index')->with('thong-bao', 'success');
    }
    
    function edit($id)
    {
        /** Cách 1
         *  $product = Products::where('prd_id', '=', $id)->firstOrFail();
         */
        // $data['category'] = Categories::find($id);
        // $data['categories'] = Categories::all();
        $product = Products::find($id);
        $categoriesData = Categories::all();
        return view('Backend.Product.editproduct', compact('product', 'categoriesData'));
    }

    /**
     * Cập nhật sản phẩm
     * Cập nhật, xóa ảnh cũ
     * Cập nhật, thêm tên ngẫu nhiên nếu có ảnh trùng
     * Cập nhật, thêm slug image, để cso thể SEO(nếu có khoảng trống)
     */
    function editPost(Request $request, $id)
    {
        $product = Products::find($id);
        $product->cat_id = $request->cat_id;
        $product->prd_name = $request->name;
        $product->prd_code = $request->code;
        $product->prd_name = $request->name;
        $product->prd_price = $request->price;
        $product->prd_featured = $request->featured;
        $product->prd_state = $request->state;
        $product->prd_info = $request->info;
        $product->prd_describer = $request->describe;
        $product->prd_slug = Str::slug($request->name, '-');
        if ($request->img != '') {
            if ($product->prd_image != null) {
                $file_old = public_path('Backend\img\product\\') . $product->prd_image;
                if (file_exists($file_old) != null) {
                    unlink($file_old);
                }
            }
            // Upload file image
            $image = $request->file('img');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('Backend\img\product');
            /** Nếu thư mục gốc đã tồn tại ảnh(của 1 sản phẩm khác cùng ảnh)
             * Lấy ramdom -> gán vào tên của ảnh được update
             * Str::replaceFirst trong đó: https://laravel.com/docs/7.x/helpers
             * tham số thứ nhât là chuỗi ban đầu
             * tham số thứ hai là chuỗi được thay thế
             * tham số thứ ba là tên img chờ được ramdom
             * 
             */
            $file_old = public_path('Backend\img\product\\') . $name;
            if (file_exists($file_old)) {
                $string = '0123456789';
                $strRamdon = substr(str_shuffle(str_repeat($string, 5)), 0, 10);
                $resultStr = Str::replaceFirst(' ', '-', $name); // gai-xinh.jpg
                $resultStr_v1 = Str::replaceFirst('.', $strRamdon . '.', $resultStr); // gai-xinh5818817500.jpg
                $image->move($destinationPath, $resultStr_v1);
                $product->prd_image = $resultStr_v1;
            } else {
                $strImage = Str::replaceFirst(' ', '-', $name);
                $image->move($destinationPath, $strImage);
                $product->prd_image = $strImage;
            }
            $product->save();
            return redirect()->route('product.index')->with('thong-bao', 'success');
        }
    }
    function delete($id)
    {
        $product = Products::find($id);
        $product->delete($id);
        return redirect()->route('product.index')->with('thong-bao', 'success');
    }
}
