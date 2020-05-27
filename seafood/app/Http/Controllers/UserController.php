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
        //$data=$req->only('email','password');
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
        {
            $rs=DB::table('users')->where('email',$req->email)->first();
            Session::put('cus_name',$rs->name);
            Session::put('id_customer',$rs->id);
            // dd($rs->id);
            // return back()->with('Thongbao','Dang nhap thanh cong');
            return redirect()->route('trangchu');

        }else{
            return back()->with('error','Dang nhap that bai.Xin vui long kiem tra lai');
        }
    }


    public function register(Request $req)
    {
        $this->validate($req,
        [
            'name'=>'required|min:2|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:255',
            'password'=>'required|min:6|max:255',
            're_password'=>'required|same:password',
        ],
        [
            'name.required'=>'Họ tên không được bỏ trống',
            'name.min'=>'Họ tên tối thiểu 2 ký tự',
            'name.max'=>'Họ tên tối đa 255 ký tự',
            'email.required'=>'Địa chỉ email không được bỏ trống',
            'email.email'=>'Địa chỉ email không đúng định dạng',
            'password.required'=>'Đã tồn tại đại chỉ email trong hệ thống',
            'password.min'=>'Mật khẩu không được bỏ trống',
            'password.max'=>'Mật khẩu tối đa 255 ký tự', 
            're_password.required'=>'Không được bỏ trống',
            're_password.same'=>'Nhập không đúng với trường mật khẩu',

        ]
    );
    $data=array();
    $data['name']=$req->name;
    $data['email']=$req->email;
    $data['password']=bcrypt($req->password);
    // $data['password']=md5($req->password);
    $rs= DB::table('users')->insert($data);
    if($rs)
    {
        //Alert::success('Success Title', 'Success Message');
        alert()->success('register','Đăng kí thành công!');
        //return redirect('/')->with('alert', 'Updated!');
        return back();
    }else
    {
        //Alert::error('Error Title', 'Error Message');
        alert()->error('register','Đăng kí thất bại!');
        return back();
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
    public function checklogin(Request $req)
    {

    }
}
