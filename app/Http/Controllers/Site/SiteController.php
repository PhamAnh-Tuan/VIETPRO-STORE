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
    // About
    function about()
    {
        return view('Site.about');
    }
    // Contact
    function contact()
    {
        return view('Site.contact');
    }
}
