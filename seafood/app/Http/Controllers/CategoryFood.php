<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorymodel;
use App\tbl_category;
use DB;
// Thư viện mới
use App\http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;//Trả về cái j đó
session_start();
class CategoryFood extends Controller
{
    public function thong_ke()
    {
        $orderYear = DB::table('f_order')
                    ->select(DB::raw('month(date) as getYear'), DB::raw('SUM(totail) as value'))
                    ->groupBy('getYear')
                    ->orderBy('getYear', 'ASC')
                    ->get();
                   
        return view('admin.thongke.thongke', compact('orderYear'));
    }
   public function getFood()
   {
    return view('admin_layout');
   }

    protected $cates=array();
    protected $categories=array();
    protected $a1=array();
    protected $dem=0;
    public function getContentFood(){
      
       return view('admin.Home.list_food');
   }
   public function getFoodct()
   {
    $dem=1;
    $this->cates=array();
    $db=categorymodel::where('idparent','0')->get();
    foreach($db as $key=>$a){
        $a->name_menu="<b>$a->name_menu</b>";
        $a->stt=$dem++;
        array_push($this->cates,$a);

        $db1=categorymodel::where('idparent',$a->id)->get();
        if(!empty($db1)){
            foreach($db1 as $key1=>$a1){
                $a1->stt=$dem++;
                $a1->name_menu="|-".$a1->name_menu;
                array_push($this->cates,$a1);
            }
        }
    }
    $cate=DB::table('tbl_category')->where('idparent','0')->orderBy('id','asc')->get();
       return view('admin.Food.list_food_c')->with("datas",$this->cates)->with('cate',$cate);
   }

   public function create_f(Request $request)
   {
    $category = new categorymodel();
    $category->name_menu=$request->name_menu;
    $category->idparent=$request->idparent;
    $category->desc_food=$request->desc_food;
    $category->image = $request->Image;
    $category->price=$request->price;
    $result = $category->save();
    return response()->json([
        'status' => $result
    ]);
   }

   public function updatefood(Request $request,$id)
   {
    $category = categorymodel::find($id);
    $category->name_menu=$request->name_menu;
    $category->idparent=$request->idparent;
    $category->desc_food=$request->desc_food;
    if($request->Image != "")
        $category->image = $request->Image;
    $category->price=$request->price;
    $result = $category->save();
    return response()->json([
        'status' => $result
    ]);
   }

   public function deletefood($id)
   {
       $category= categorymodel::find($id);
       $result = $category->delete();
       return response()->json([
           'status'=>$result
        ]);
   }

   public function editfood($id)
   {
    $category =categorymodel::find($id);
    return response()->json([
        'food'=>$category,
        'status' => true
    ]);
    }

    public function create_type_f(Request $request)
    {
        $category = new categorymodel();
        $category->name_menu=$request->name_menu;
        $category->idparent=$request->idparent;
        $category->save();
        return redirect('/homes2')->with('category',$category);
    }
    public function view_create_tf()
    {
        return view('admin.Food.create_type_f');
    }

}
