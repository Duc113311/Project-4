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
use App\NewsFoodModel;
class NewFoodController extends Controller
{
    public function getallnew()
    {
        $category=DB::table('tbl_category')->where('idparent','0')->orderby('id','asc')->get();
        $news_food=DB::table('news_food')->orderby('id','asc')->get();
        return view('pages.tintuc.news_food')->with('category',$category)->with('news_food',$news_food);;
    }
    public function getlistnew()
    {
        $news_food=DB::table('news_food')->orderby('id','asc')->get();
        return view('admin.Tin_tuc.ql_tintuc')->with('news_food',$news_food);
    }
    public function create_news(Request $request)
    {
      
     $news_food = new NewsFoodModel();
     $news_food->title_news=$request->title_news;
     $news_food->image_news=$request->image_news;
     $news_food->content_news=$request->content_news;
     $result = $news_food->save();
     return response()->json([
         'status' => $result
     ]);
    }
    public function update_news(Request $request,$id)
    {
     $news_food = NewsFoodModel::find($id);
     $news_food->title_news=$request->title_news;
     $news_food->content_news=$request->content_news;
     if($request->image_news != "")
     $news_food->image_news=$request->image_news;
     $result = $news_food->save();
     return response()->json([
         'status' => $result
     ]);
    }
 
    public function delete_news($id)
    {
        $news_food= NewsFoodModel::find($id);
        $result = $news_food->delete();
        return response()->json([
            'status'=>$result
         ]);
    }
 
    public function edit_news($id)
    {
     $news_food =NewsFoodModel::find($id);
     return response()->json([
         'food'=>$news_food,
         'status' => true
     ]);
     }
}
