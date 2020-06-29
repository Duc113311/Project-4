<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// Thư viện mới
use App\ResourcesModel;
use App\http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;//Trả về cái j đó
session_start();
class ResourcesController extends Controller
{
    protected $res=array();
    protected $a=array();
    protected $dem=0;
    public function getRes()
    {
        $dem=1;
        $this->res=array();
        $db=ResourcesModel::where('idparent','0')->get();
        foreach($db as $key=>$a1)
        {
            $a1->name_res="<b>$a1->name_res</b>";
            $a1->stt=$dem++;
            array_push($this->res,$a1);

            $db1=ResourcesModel::where('idparent',$a1->id)->get();
            if(!empty($db1)){
                foreach($db1 as $key1=>$a)
                {
                    $a->stt=$dem++;
                    $a->name_res="|-".$a->name_res;
                    array_push($this->res,$a);
                }
                   
            }
        }
        $res_type=DB::table('resources')->where('idparent','0')->get();
        return view('admin.Food.list_resources')->with("datas",$this->res)->with('res_t',$res_type);
    }

    public function creat_res(Request $request)
    {
        $res=new ResourcesModel();
        $res->name_res=$request->name_res;
        $res->idparent=$request->idparent;
        $res->image=$request->Image;
        $result=$res->save();
        return response()->json([
            'status' => $result
        ]);
    }
    public function view_res_type()
    {
        return view('admin.Food.create_res_type');
    }
    public function create_type_res(Request $request)
    {
        $res=new ResourcesModel();
        $res->name_res=$request->name_res;
        $res->idparent=$request->idparent;
        $res->save();
        return redirect('/resources')->with('rest',$res);
    }
    public function deleteres($id)
    {
        $res= ResourcesModel::find($id);
        $result=$res->delete();
        return response()->json([
            'status' => $result
        ]);
    }
    public function eidt_res($id)
    {
        $res=ResourcesModel::find($id);
        $res_typ=DB::table('resources')->where('idparent','0')->get();
        return view('admin.Food.list_resources')->with('res',$res)->with('res_typ',$res_typ);
    }
}
