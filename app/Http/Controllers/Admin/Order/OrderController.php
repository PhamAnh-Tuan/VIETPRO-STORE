<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index()
    {
        return view('Backend.Order.order');
    }
    function detail()
    {
        return view('Backend.Order.detailorder');
    }
    function processed()
    {
        return view('Backend.Order.processed');
    }
}
