<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(12); 
        return view('Backend.User.listuser', compact('users'));
    }
    function create()
    {
        $data=DB::table('users')->get();
        return view('Backend.User.adduser',compact('data'));
    }
    function createPost(CreateUserRequest $request)
    {
        $user = new User;
        $user->user_fullname = $request->user_fullname;
        $user->user_email = $request->user_email;
        $user->user_password =$request->user_password;
        $user->user_phone = $request->user_phone;
        $user->user_level = $request->user_level;
        $user->user_address = $request->user_address;
        $user->user_remenber_token = $request->user_address;
        // dd($user);
        $user->save();
     return redirect()->route('user.index')->with('thong-bao','success');
    }
    function edit($id)
    {
        // Cách 1
        // $user=User::find($id);
        // dd($id);
        // print_r($id);

        // Cách 2
        $user=DB::table('users')->where('user_id', '=', $id)->first();
        return view('Backend.User.edituser',compact('user'));
       
        // Cách 3
        // $data['user']=User::find($id);
        // return view('Backend.User.edituser',$data);


    }
    function editpost(CreateUserRequest $request, $id)
    {
        $user=User::find($id);
        $user->user_fullname = $request->user_fullname;
        $user->user_email = $request->user_email;
        $user->user_password =$request->user_password;
        $user->user_phone = $request->user_phone;
        $user->user_level = $request->user_level;
        $user->user_address = $request->user_address;
        $user->user_remenber_token = $request->user_address;
        // dd($user);
        // $user->save();
        // return redirect()->route('user.index')->with('thong-bao','success');
    }
    function delete()
    {
        return "xoa";
    }
}
