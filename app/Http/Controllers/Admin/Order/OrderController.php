<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index()
    {
        $order=Order::where('ord_state', '=', '0')->get();
        return view('Backend.Order.order',compact('order'));
    }
    function detail($id)
    {
        /** Tổng tiền sẽ tính khi đơn hàng được đưa vào trong csdl ở bảng đơn hàng, không tính ở đây
         * 
         */
        $sum = 0;
        $total=0;
        $order=Order::find($id);
        $details = $order->details()->get();
        return view('Backend.Order.detailorder',compact('details','order','sum','total'));
    }
    function Detail_processed($id)
    {
        $order = Order::find($id);
        $order->ord_state=1;
        $order->save();
        return redirect()->route('order.processed')->with('thong-bao','Don hang da duoc cap nhat');
    }
    function processed()
    {
        $order_processed=Order::where('ord_state', '=', '0')->get();
        return view('Backend.Order.processed',compact('order_processed'));
    }
    public function SearchById(Request $request, $id)
    {
        // ->get thay vi first phuc vu cho tim kiem theo ten(co nhieu ten, nen su dung get)
        // $data= Order::search($id)->where('ord_state', '1')->get();
        $data= Order::search($id)->where('ord_id', $id)->get();
        $data_= Order::search($id)->where('ord_id', $id)->first();
        $name=$data_->ord_fullname;
        return view('Backend.Order.OrderSearch',compact('data','name'));
    }
    public function SearchByIdSubmit(Request $request)
    {
        $data = Order::search($request->search)->get();
        return view('Backend.Order.OrderSearch',compact('data'));
    }
}
