<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function cart()
    {
        return view('Site.cart.cart');
    }
    function checkout()
    {
        return view('Site.cart.checkout');
    }
    function complete()
    {
        return view('Site.cart.complete');
    }
}
