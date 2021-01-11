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
use App\Exports\UsersExport;
use App\Exports\UsersExport_V1;
use App\Exports\UserFindIDExport;
use App\Exports\UsersExport_FromView;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Carbon\Carbon;


class UserController extends Controller
{
    public function index()
    {
        // Query Builder
        // $users=DB::table('users')->get();
        
        // ORM
        // $users=User::all();
        $users = User::paginate(4); 
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
        $user->password =Hash::make($request->user_password);
        $user->user_phone = $request->user_phone;
        $user->user_level = $request->user_level;
        $user->user_address = $request->user_address;
        $user->remember_token = $request->user_address;
        $user->provider='';
        $user->provider_id='';
        
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
        $user->password =$request->user_password;
        $user->user_phone = $request->user_phone;
        $user->user_level = $request->user_level;
        $user->user_address = $request->user_address;
        $user->remember_token = $request->user_address;
        $user->provider='';
        $user->provider_id='';
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
        $user->password='chuvanhuy';
        $user->user_address='Hung Yen';
        $user->user_level='1';
        $user->user_phone='0374970903';
        $user->remember_token='0374970903';
        $user->provider='';
        $user->provider_id='';
        $user->save();

        dd($user);
    }
    public function useCreate_v1()
    {
        $data=
        [
            'user_fullname'=>'chu van huy',
            'user_email'=>'chuvanhuy@gmail.com',
            'password'=>'chuvanhuy',
            'user_address'=>'Hung Yen',
            'user_level'=>'1',
            'user_phone'=>'0374970903',
            'remember_token'=>'0374970903'
            
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

    /** Laravel Excel
     * function export(): test xuất file
     * function export_id: test xuất file theo ID
     * 
     * Tôi muốn tải xuống tệp excel thông qua Hộp kiểm ID duy nhất trong laravel, tôi đang sử dụng Maatwebsite \ Excel Tại đây
     * https://stackoverflow.com/questions/64203069/i-want-to-download-a-excel-file-through-checkbox-unique-id-in-laravel-i-am-usin
     */
    public function export() 
    {
        #CSV
        //return Excel::download(new UsersExport,'invoices.csv', \Maatwebsite\Excel\Excel::CSV);
        #XLSX
        //return Excel::download(new UsersExport, 'invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        #TSV
        //return Excel::download(new UsersExport, 'invoices.tsv', \Maatwebsite\Excel\Excel::TSV);
        #ODS
        //return Excel::download(new UsersExport, 'invoices.ods', \Maatwebsite\Excel\Excel::ODS);
        #XLS
        //return Excel::download(new UsersExport, 'invoices.xls', \Maatwebsite\Excel\Excel::XLS);
    }
    public function export_id($id)
    {
        $user=User::find($id)->first();
        $name=$user->user_fullname;
        return Excel::download(new UserFindIDExport($id), $name.'.xlsx');
    }

    public function info($id){
        $user = User::find($id);
        return view('backend.user.infouser',compact('user'));
    }
    public function avatar(Request $request, $id){
        $user = User::find($id);
        $slug = Str::slug($user -> user_fullname,'-');
        $user ->  user_fullname = $user ->  user_fullname;
        $user ->  user_email = $user ->  user_email;
        $user -> password = $user -> password;
        $user ->  user_phone = $user ->  user_phone;
        $user ->  user_address = $user ->  user_address;
        $user ->  user_level = $user ->  user_level;
        if($request -> hasFile('image')){
            $file = $request -> file('image');
            //tạo tên của file cần lưu
            $fileName =  $slug.'_'.Carbon::now()-> second.'.'.$file->getClientOriginalExtension();
            //đường dẫn lưu file
            $path = public_path().'/uploads/avatar';
            //di chuyển file đến nơi lưu trên server
            $file -> move($path,$fileName);
            // chuẩn bị tên file lưu vào database
            $user -> avatar = $fileName;
        }
        // dd($user);
        $user -> save();
        return redirect()->route('user.info',['id'=> $user-> user_id]);
        
    }

}
