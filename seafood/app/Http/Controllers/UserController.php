<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use Alert;
use RealRashid\SweetAlert\Facades\Aler;
// Thư viện mới
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Hash;
use App\http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\categorymodel;
use App\accountuser;
class UserController extends Controller
{
    public function getSignup(Request $req)
    {
        $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();
        return view('pages.login.signup')->with('category',$category);
    }
    public function getregister(Request $req)
    {
        $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();
        return view('pages.login.register')->with('category',$category);
    }
    public function login(Request $req)
    {
      
        $validator = Validator::make($req->all(),
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:8',
        ],
        [
            'email.required'=>'Địa chỉ email không được bỏ trống',
            'email.email'=>'Địa chỉ email không đúng định dạng',
            'password.required'=>'Mật khẩu không được bỏ trống',
            'password.min'=>'Mật khẩu tối thiểu 6 ký tự',
            'password.max'=>'Mật khẩu tối đa 8 ký tự', 
        ]);
        if ($validator->fails()) {
            return response()->json([
         'status'=>false,
         'message'=>"Lỗi"
            ],200);
         }
         else{
            if(Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
            {
                $rs=DB::table('users')->where('email',$req->email)->first();
                Session::put('cus_name',$rs->name);
                Session::put('id_customer',$rs->id);
               
                 }
                 return response()->json([
                    'status'=>$rs
                ]);
         }
    }


    public function register_dk(Request $req)
    {
        $validator = Validator::make($req->all(),
        [
            'name'=>'required|min:2|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:255',
            're_password'=>'required|same:password',
        ],
        [
            'name.required'=>'Họ tên không được bỏ trống',
            'name.min'=>'Họ tên tối thiểu 2 ký tự',
            'name.max'=>'Họ tên tối đa 255 ký tự',
            'email.required'=>'Địa chỉ email không được bỏ trống',
            'email.email'=>'Địa chỉ email không đúng định dạng',
            'email.unique'=>'Địa chỉ email đã tồn tại',
            'password.required'=>'Đã tồn tại đại chỉ email trong hệ thống',
            'password.min'=>'Mật khẩu không được bỏ trống',
            'password.max'=>'Mật khẩu tối đa 255 ký tự', 
            're_password.required'=>'Không được bỏ trống',
            're_password.same'=>'Nhập không đúng với trường mật khẩu',

        ]);
        if ($validator->fails()) {
           return response()->json([
        'status'=>false,
        'message'=>"Lỗi"
           ],200);
        }
        else{
             $data=array();
            $data['name']=$req->name;
            $data['email']=$req->email;
            $data['password']=bcrypt($req->password);
            // $data['password']=md5($req->password);
            $rs= DB::table('users')->insert($data);
            return response()->json([
                'status'=>$rs
            ]);
        }
   
    }
    
    public function login_customer(Request $req)
    {
        $un=$req->email;
        $pw=$req->password;
        //dd($un,$pw);
        $rs=DB::table('users')->where('email',$un)->where('password',$pw)->first();
        dd($rs);
        if($rs)
        {
            Session::put('cus_name',$rs->name);
            Session::put('id_customer',$rs->id);
            dd($rs->id);
            return redirect('/');
        }else {
            return back()->with('mess','Tên đăng nhập hoặc mật khẩu không chính xác');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('trangchu');
    }
    

    public function getLoginAdmin()
    {
        return view('admin.Login_admin.login');
    }

    public function postLogin(Request $req)
    {
        $arr=['email'=>$req->email,'password'=>$req->password];
        if($req->remember='Remember Me'){
            $remember=true;
        }
        else{
            $remember=false;
        }
        if(Auth::attempt($arr,$remember))
        {
           return \redirect()->intended('/homes');
        }else{
            return back()->withInput()->with('error','Tai khoan mat khau chua dung');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return \redirect()->intended('login_a/Login_admin');
    }
}
