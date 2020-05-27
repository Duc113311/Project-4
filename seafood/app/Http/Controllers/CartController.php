<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;//Trả về cái j đó
use App\http\Requests;
use Session;
session_start();
use App\Cart;
use App\order_detail_model;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
   
    public function AddCartFood(Request $req,$id){
        $category_food=DB::table('tbl_category')->where('id',$id)->first();// lấy sp đầu tiên
        
        if($category_food != null){
            $oldcart= Session::has('Cart') ? Session::get('Cart') :null;// toán tử 3 ngôi

            $newCart= new Cart($oldcart);//Từ lớp Cart.php
            // \Log::debug('BEFORE ADDED: ');
            // \Log::debug($newCart->categorys);
            $newCart->AddCart($category_food,$id);//Truyền vào sp và id, gọi đến cáu addcart trong lớp cart
            // \Log::debug('AFTER ADDED: ');
            // \Log::debug($newCart->categorys);
            $req->session()->put('Cart', $newCart);//key là cart, value là newcart
        }
        return view('pages.cart.cart_fod');
    }

    public function Delete_food_cart(Request $req,$id){
 
        $oldcart= Session::has('Cart') ? Session::get('Cart') :null;// toán tử 3 ngôi
        $newCart= new Cart($oldcart);//Từ lớp Cart.php
        $newCart->DeleteCart($id);
        if(Count($newCart->categorys)>0){
            $req->Session()->put('Cart',$newCart);

        }else{
            $req->Session()->forget('Cart');
        }
        return view('pages.cart.cart_fod');
     
    }
    public function View_shopcart(){
        $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();
        return view('pages.cart.show_cart')->with('category',$category);
    }

    public function Delete_cart(Request $req,$id){
 
        $oldcart= Session::has('Cart') ? Session::get('Cart') :null;// toán tử 3 ngôi
        $newCart= new Cart($oldcart);//Từ lớp Cart.php

        $newCart->DeleteCart($id);
        if(Count($newCart->categorys)>0){
            $req->Session()->put('Cart',$newCart);

        }else{
            $req->Session()->forget('Cart');
        }
        return view('pages.list-cart-food');
     
    }
    public function Save_cart_food(Request $req,$id,$quanty)
    {
        $oldcart= Session::has('Cart') ? Session::get('Cart') :null;// toán tử 3 ngôi - Lấy giỏ hàng cũ
        $newCart= new Cart($oldcart);//Từ lớp Cart.php - Tạo 1 new cart
        $newCart->UpdateItemCart($id,$quanty);//Cap nhật lại

        $req->Session()->put('Cart',$newCart);

        return view('pages.list-cart-food');
     
    }
 

    // Thanh toán
    public function getformpay()
    {
        $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();
        $oldcart= Session::has('Cart') ? Session::get('Cart') :null;// toán tử 3 ngôi - Lấy giỏ hàng cũ
      

       return view('pages.cart.paycart')->with('category',$category);
    }
   
    public function savecontact(Request $req)
    {
       
        $this->validate($req,
        [
            'name'=>'required|min:2|max:255',
            'address'=>'required|min:2',
            'phone'=>'required|min:2|max:12',
            'email'=>'required|email',
            'date'=>'required',
            'time'=>'required',
            'note'=>'required|min:2',
        ],
        [
            'name.required'=>'Họ tên không được bỏ trống',
            'name.min'=>'Họ tên tối thiểu 2 ký tự',
            'name.max'=>'Họ tên tối đa 255 ký tự',
            'name.address'=>'Họ tên tối thiểu 2 ký tự',
            'email.required'=>'Địa chỉ email không được bỏ trống',
            'email.email'=>'Địa chỉ email không đúng định dạng',
            'phone.required'=>'Họ tên không được bỏ trống',
            'phone.min'=>'Dữ liệu tên tối thiểu 2 ký tự',
            'phone.max'=>'Dữ liệu tên tối đa 12 ký tự',
            'date.required'=>'Dữ liệu nhập vào ko bỏ trống',
            'time.required'=>'Dữ liệu nhập vào ko bỏ trống',
            'note.required'=>'Dữ liệu nhập vào ko bỏ trống',
            'note.min'=>'Dữ liệu tối thiểu 2 ký tự',
        ]
    );
    $cart=Session::get('Cart');
    $arrOrder=array();
    if(Auth::check()){
        $arrOrder['id_customer']=Auth::user()->id;
        $arrOrder['totail']=$cart->totailPrice;
        $arrOrder['address']=$req->address;
        $arrOrder['date']=$req->date;
        $arrOrder['note']=$req->note;
        $arrOrder['time']=$req->time;
        $arrOrder['status']=1;
        $id_order=DB::table('order')->insertGetId($arrOrder);
        foreach($cart->categorys as $key=>$value)
        {
            $order_detail=new order_detail_model();
            $order_detail->id_category=$key;
            $order_detail->id=$id_order;
            $order_detail->qty=$value['quanty'];
            $order_detail->price=$value['price'];
            $order_detail->save();
        }

        Session::forget('Cart');
        
        return redirect()->route('trangthai');
    }
    }

    public function getTrangthai()
    {
        $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();
       $id_cus=Session::get('id_customer');
    //    dd($id_cus);
       $ord_cus=DB::table('order')->where('id_customer',$id_cus)->where('status',1)->get();

       foreach($ord_cus as $i)
       {
           $valu=DB::table('order_detail')->join('tbl_category','tbl_category.id','=','order_detail.id_category')->where('order_detail.id',$i->id)->get();
          
           $i->order=$valu;
       }
    //    dd($ord_cus);
    $order_distroyed=DB::table('order')->where('id_customer',$id_cus)->where('status',4)->get();
    foreach($order_distroyed as $i1)
    {
        $valu=DB::table('order_detail')->join('tbl_category','tbl_category.id','=','order_detail.id_category')->where('order_detail.id',$i1->id)->get();
          
        $i1->order=$valu;
    }

       return view('pages.cart.status_cart',['ord_cus'=>$ord_cus,'ord_dis'=>$order_distroyed])->with('category',$category);
    }

    public function distroy_order_cus($id)
    {
        // dd($id);
        DB::table('order')->where('id',$id)->update(['status'=>4]);
        return redirect()->route('trangthai');
    }
}
