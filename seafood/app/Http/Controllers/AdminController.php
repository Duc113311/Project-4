<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// Thư viện mới
use App\http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;//Trả về cái j đó
session_start();
class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }
    public function show_admin(){
        return view('admin.homes');
    }
    public function Show_home(Request $request){
        $admin_email= $request ->admin_email;
        $admin_password=md5($request->admin_password);

        $result = DB::table('tbl_admin')-> where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();//1 user
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('id',$result->id);
            return Redirect::to('/homes');
        }else{
            Session::put('message','Mật khẩu sai, xin nhập lại');
            return Redirect::to('/admin_login');
        }
    }
    public function Logout(){
       Session::put('admin_name',null);
       Session::put('id',null);
       return Redirect::to('/admin_login');
    }
}
