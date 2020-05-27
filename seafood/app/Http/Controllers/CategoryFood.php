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
    public function add_category_food(){
        $category=DB::table('tbl_category')->where('idparent','0')->get();
        return view('admin.add_category_food')->with('category',$category);
    }
    public function all_category_food(){
        
        return view('admin.all_category_food');
    }
    
    protected $cates=array();
    protected $categories=array();
    protected $a1=array();
    protected $dem=0;
    public function getCategoryt(){
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
                    $a1->name_menu="|---".$a1->name_menu;
                    array_push($this->cates,$a1);
                }
            }
        }
        return view('admin.all_category_food')->with("datas",$this->cates);
    }
   public function store(Request $request)
   {
       $category=new categorymodel();
       $category->name_menu=$request->input('name_menu');
       $category->idparent=$request->input('idparent');
     if($request->hasFile('image')){
         $file=$request->file('image');
         $extension =$file->getClientOriginalName();
         $filename=time() . '.' .$extension;
         $file->move('backend/images/',$filename);
         $category->image=$filename;
     }else{
         return $request;
         $category->image='';
     }
       $category->desc_food=$request->input('desc_food');
       $category->price=$request->input('price');
       $category->save();
       return redirect('/all-category-food')->with('category',$category);
   }

   public function editfood($id){
       $category =categorymodel::find($id);
       $categories=DB::table('tbl_category')->where('idparent','0')->get();
       return view('admin.update_category_food')->with('category',$category)->with('categories',$categories);
   }
   public function updatefood(Request $request,$id)
   {
       $category= categorymodel::find($id);

       $category->name_menu=$request->input('name_menu');
       $category->idparent=$request->input('idparent');
     if($request->hasFile('image')){
         $file=$request->file('image');
         $extension =$file->getClientOriginalName();
         $filename=time() . '.' .$extension;
         $file->move('backend/images/',$filename);
         $category->image=$filename;
     }
       $category->desc_food=$request->input('desc_food');
       $category->price=$request->input('price');
       $category->save();

       return redirect('/all-category-food')->with('category',$category);
   }

    public function deletefood($id)
    {
        $category= categorymodel::find($id);
        $category->delete();

        return Redirect('/all-category-food')->with('category',$category);
    }

  //hien thị danh muc
 
// Hiên thị chi tiết đồ ăn
    public function foodtype()
    {
        $db=DB::table('tbl_category')->where('idparent','0')->orderby('id','desc')->get();
        return view('admin.danhmuc.foodtype')->with('food',$db);
    }
  
}
