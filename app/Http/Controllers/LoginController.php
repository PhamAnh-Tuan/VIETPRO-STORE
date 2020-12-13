<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function LoginGet()
    {
        return view('Backend.login');
    }
    public function LoginPost(LoginRequest $request){
        
        return 'day la trang amdin';
    }
}
