<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    public function index()
    {
        // Query Builder
        // $users=DB::table('users')->get();
        
        // ORM
        $users=User::all();
        // $users = User::paginate(12); 
        return view('Backend.User.listuser', compact('users'));
    }
    function create()
    {
        // $data=DB::table('users')->get();
        // return view('Backend.User.adduser',compact('data'));
        return view('Backend.User.adduser');
    }
    function createPost(CreateUserRequest $request)
    {
        // dd($request->all());
        $user = new User;
        $user->user_fullname = $request->user_fullname;
        $user->user_email = $request->user_email;
        $user->user_password =Hash::make($request->user_password);
        $user->user_phone = $request->user_phone;
        $user->user_level = $request->user_level;
        $user->user_address = $request->user_address;
        $user->user_remenber_token = $request->user_address;
        
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
    function editpost(EditUserRequest $request, $id)
    {
        $user=User::find($id);
        $user->user_fullname = $request->user_fullname;
        $user->user_email = $request->user_email;
        $user->user_password =$request->user_password;
        $user->user_phone = $request->user_phone;
        $user->user_level = $request->user_level;
        $user->user_address = $request->user_address;
        $user->user_remenber_token = $request->user_address;
        dd($user);
        $user->save();
        return redirect()->route('user.index')->with('thong-bao-update','success');
    }
    function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        // dd($user);
        return redirect()->route('user.index')->with('thong-bao-delete','succsess');
    }

    // ORM
    public function useList()
    {
        $data=User::all();
        dd($data);
    }
    public function useFind($id)
    {
        $data=User::find($id);
        dd($data);
    }
    public function useWhere($id)
    {
        $data=User::where('user_id','=',$id)->get();
        dd($data);
    }
    public function useSelect()
    {
        $data=User::select('user_fullname','user_phone')->get();
        dd($data);
    }
    public function useCreate()
    {
        $user=new User();
        $user->user_fullname='chu van huy';
        $user->user_email='chuvanhuy@gmail.com';
        $user->user_password='chuvanhuy';
        $user->user_address='Hung Yen';
        $user->user_level='1';
        $user->user_phone='0374970903';
        $user->user_remenber_token='0374970903';
        $user->save();

        dd($user);
    }
    public function useCreate_v1()
    {
        $data=
        [
            'user_fullname'=>'chu van huy',
            'user_email'=>'chuvanhuy@gmail.com',
            'user_password'=>'chuvanhuy',
            'user_address'=>'Hung Yen',
            'user_level'=>'1',
            'user_phone'=>'0374970903',
            'user_remenber_token'=>'0374970903'
        ];
        User::create($data);
        echo "createsuccess";
    }
    public function userUpdate($id)
    {
        $user=User::find($id);
        $user->user_fullname='chu van huy';
        $user->save();
        // dd($user);
        echo "createsuccess";
    }
    
}
