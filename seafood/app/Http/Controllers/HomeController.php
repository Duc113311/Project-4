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
Use Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\CommentModel;
class HomeController extends Controller
{
    public function index(){
        $all_food=DB::table('tbl_category')->where('idparent','2')->orderby('id','desc')->limit(6)->get();
        $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();

        $food_hot=DB::table('tbl_category')
        ->join('order_detail','order_detail.id_category','=','tbl_category.id')->orderBy('qty','desc')->limit(6)->get();

        $table=DB::table('tbl_table')->where('idparent','1')->orderBy('id','asc')->get();
                                            $table1=DB::table('tbl_table')->where('idparent','2')->orderBy('id','asc')->get();

        return view('pages.home')->with('all_food',$all_food)
        ->with('category',$category)->with('food_hot',$food_hot)->with('tbl_table',$table)->with('tbl_table1',$table1);
    }
    public function gettable_book(Request $request)
    {
      $table=DB::table('tbl_table')->where('idparent','!=',0)->get();
      foreach ($table as $key => $value) {
        $bool_table=DB::table('book_table')->where('id_table',$value->id)->where('order_date','=',date('Y-m-d', strtotime($request->date_b)))->get();
        $value->book_table=$bool_table;
      }
      return response()->json($table);    
    }

    public function Details_food($id)
    {
        $detail_cate_food=DB::table('tbl_category')->where('id','=',$id)->first();
        $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();

        $related_category=DB::table('tbl_category')->where('tbl_category.idparent','=',$detail_cate_food->idparent)->limit(3)->get();

        $comment_f=CommentModel::where('com_category',$id)->get();
        return view('pages.ct_food')
        ->with('detail_cate_food',$detail_cate_food)
        ->with('category',$category)
        ->with('relate',$related_category)
        ->with('comnent_food',$comment_f);
    }
   public function Showcategory_food(Request $request,$id)
   {
    // ->paginate(6)
    $ct_cate_food=DB::table('tbl_category')->where('idparent','=',$id)->paginate(6);
    $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();
   if($request->price){
      $price=$request->price;
      switch($price)
      {
          case '1':
            $ct_cate_food=DB::table('tbl_category')->where('idparent','=',$id)->where('price','<',200000)->paginate(6);
            
          break;

          case '2':
            $ct_cate_food=DB::table('tbl_category')->where('idparent','=',$id)->whereBetween('price',[200000,1000000])->paginate(6);
          break;

          case '3':
            $ct_cate_food=DB::table('tbl_category')->where('idparent','=',$id)->whereBetween('price',[1000000,5000000])->paginate(6);
          break;

      }
   }
    return view('pages.listfood',['tbl_category'=>$ct_cate_food])->with('ct_cate_food',$ct_cate_food)->with('category',$category);
   }

  //  public function SendMail($mail)
  //  {
  //    dd('vao');
  //    $details=[
  //      'title'=>'Mail from Seafood',
  //      'body'=>'Đây là tin nhắn'
  //    ];
  //    \mail::to($mail)->send(new \App\Mail\SendMail($details));
  //  }
  
  public function Booktable(Request $request)
  {
    $all_food=DB::table('tbl_category')->where('idparent','2')->orderby('id','desc')->limit(6)->get();
    $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();
    $this->validate($request,
    [
        'name_customer'=>'required|min:2|max:255',
        'order_date'=>'required',
        'phone_number'=>'required',
        'Number_customer'=>'required',
        'email'=>'required',
        'Note'=>'required|min:2|max:255',
        'time_order'=>'required',
    ],
    [
        'name_customer.required'=>'Họ tên không được bỏ trống',
        'name_customer.min'=>'Họ tên tối thiểu 2 ký tự',
        'name_customer.max'=>'Họ tên tối đa 255 ký tự',
        'order_date.required'=>'Ngày đặt không được bỏ trống',
        'phone_number.required'=>'Số điện thoại không được bỏ trống',
        'Number_customer.required'=>'Số khách hàng không được bỏ trống',
        'Note.min'=>'Ghi chú tối thiểu 2 ký tự',
        'Note.max'=>'Ghi chú tối đa 255 ký tự',
    ]
);
$data=array();
$data['name_customer']=$request->name_customer;
$data['email']=$request->email;

$data['phone_number']=$request->phone_number;
$data['Number_customer']=$request->Number_customer;
$data['id_table']=$request->ban;
$data['order_date']=$request->order_date;
$data['time_order']=$request->time_order;
$data['min_price']=$request->min_price;
$data['Note']=$request->Note;
$rs= DB::table('book_table')->insert($data);

// dd($rs);
  return redirect('/');

  }


  public function postComment(Request $request,$id)
  {
    $comment= new CommentModel;
    $comment->com_name=$request->name;
    $comment->com_email=$request->email;
    $comment->com_content=$request->content;
    $comment->com_category=$id;
    $comment->save();
    return back();
  }

  public function getSearch(Request $request)
  {
   
    $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();
    $result=$request->result;
    $result=str_replace('  ','%',$result);
    $search_f=DB::table('tbl_category')->where('name_menu','like','%'.$result.'%')->paginate(4);
    return view('pages.search_food')
    ->with('search_f',$search_f)
    ->with('category',$category);
  }
}