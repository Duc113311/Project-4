<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
// Thư viện mới
use App\http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\categorymodel;
use Illuminate\Pagination\Paginator;
class HomeController extends Controller
{
    public function index(){
        $all_food=DB::table('tbl_category')->where('idparent','2')->orderby('id','desc')->limit(6)->get();
        $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();
        return view('pages.home')->with('all_food',$all_food)->with('category',$category);
    }
    public function Details_food($id)
    {
        $detail_cate_food=DB::table('tbl_category')->where('id','=',$id)->first();
        $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();
        return view('pages.ct_food')->with('detail_cate_food',$detail_cate_food)->with('category',$category);
    }
   public function Showcategory_food(Request $request,$id)
   {
    $ct_cate_food=DB::table('tbl_category')->where('idparent','=',$id)->paginate(5);
    $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();
    return view('pages.listfood',['tbl_category'=>$ct_cate_food])->with('ct_cate_food',$ct_cate_food)->with('category',$category);
   }
  
  
}
