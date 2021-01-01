<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function LoginGet()
    {
        return view('Backend.login');
    }
    /** Auth:
     * Login
     * Logout
     * Remember
     * 
     */
    public function LoginPost(LoginRequest $request){
        $email=$request->email;
        $password=$request->password;
        /** Nhớ tôi
         * https://laravel.com/docs/7.x/authentication#remembering-users
         */
        $remember=$request->has('remember')? true : false;
        if(Auth::attempt(['user_email' => $email, 'password' => $password],$remember)){
            return redirect()->route('admin.index');
        }
        else{
            return redirect()-> back()-> with('error','Tài khoản không tồn tại')->withInput();
        }
    }
    public function LogOut()
    {
        Auth::logout();
        return \redirect()->route('login');
    }
}
