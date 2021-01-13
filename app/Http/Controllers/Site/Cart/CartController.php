<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Them san pham vao gio hang
    public function AddToCart(Request $request){
        $request->quantity;
        $product=Products::find($request->id_product);
        Cart::add(
            [
                'id' => $product->prd_code, 
                'name' => $product->prd_name, 
                'qty' => $request->quantity, 
                'price' => $product->prd_price, 
                'weight' => 0, 
                'options' => ['image' => $product->prd_image, 'code'=>$product->prd_code]
            ]);
       
       // dd($product->prd_id);
        return redirect()->route('site.cart');
    }
    // View don hang
    function cart()
    {
        $data['cart']=Cart::content();
        $data['total']=Cart::total(0,'', ',');
        return view('Site.cart.cart',$data);
    }
    // Cap nhat don hang
    function CartUpdate($rowId,$qty)
    {
        Cart::update($rowId,$qty);
        return 200;
    }
    // Xoa don hang
    function DeleteCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('site.cart');
    }
    // Thanh toan don hang
    function checkout()
    {
        $data['cart']=Cart::content();
        $data['total']=Cart::total(0,'', ',');
        return view('Site.cart.checkout',$data);
    }
    function CheckOutPost(Request $request)
    {
        $order=new Order();
        $order->ord_fullname=$request->name;
        $order->ord_address=$request->address;
        $order->ord_email=$request->email;
        $order->ord_phone=$request->phone;
        $order->ord_total=round(Cart::total(),0);
        $order->ord_state = 0;
        $order->save();
        foreach (Cart::content() as $key => $value) {
            $order_detail = new OrderDetail();
            $order_detail->code = $value->id;
            $order_detail->name = $value->name;
            $order_detail->price = $value->price;
            $order_detail->quantity = $value->qty;
            $order_detail->image = $value->options->image;
            $order_detail->ord_id = $order->ord_id;
            $order_detail->save();
        }
        return redirect()->route('checkoutsuccess');
    }
    // Hoan tat thanh toan
    public function checkoutsuccess(){
        return view('Site.cart.complete');
    }
}
