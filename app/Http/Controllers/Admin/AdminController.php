<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use Carbon\Carbon;

class AdminController extends Controller
{
    
    function index()
    {
        // $now=Carbon::now()->format('d-m-y');
        $month=Carbon::now()->format('m');
        $year=Carbon::now()->format('Y');
        $data=[];
        $data['O']=0;
        $dt['processing']=Order::where('ord_state','0')->count();
        for ($i=1; $i<=$month ; $i++) {   
            $data["Tháng ".$i]=Order::where('ord_state','=','0')
                ->whereMonth('updated_at',$i)
                ->whereYear('updated_at',$year)
                ->sum('ord_total');
        }
        //dd($data);
        $dt['chart']=$data;
        $dt['chartData']=$data;
        $dt['month']=(int)$month;
        return view('Backend.index',$dt);
    }
}