<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    function index()
    {
        return view('Site.index');
    }
    function about()
    {
        return view('Site.about');
    }
    function contact()
    {
        return view('Site.contact');
    }
}
