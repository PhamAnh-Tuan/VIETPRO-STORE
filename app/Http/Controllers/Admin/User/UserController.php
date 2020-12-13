<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('Backend.User.listuser');
    }
    function create()
    {
        return view('Backend.User.adduser');
    }
    function edit()
    {
        return view('Backend.User.edituser');
    }
    function delete()
    {
        return "xoa";
    }
}
