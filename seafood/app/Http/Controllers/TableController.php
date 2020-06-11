<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// Thư viện mới
use App\http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\categorymodel;
use App\TableModel;
use Illuminate\Pagination\Paginator;
class TableController extends Controller
{
    public function getRoom()
    {
        $table=DB::table('tbl_table')->orderBy('id','asc')->get();
        return view('admin.room_ban.all_table')->with('table',$table);
    }
    public function create_table(Request $request)
    {
        $this->validate($req,
        [
            'name_table'=>'required',
            'number_people'=>'required',
           
        ],
        [
            'name_table.required'=>'Tên bàn không được bỏ trống',
            'number_people.required'=>'Số người trong bàn không bỏ trống',
        ]
    );
    $form_data=new TableModel;
        $form_data->name_table=$req->name_table;
        $form_data->number_people=$req->number_people;
        $form_data->status=$req->status;
        $form_data->save();
        return response()->json(['succes'=>'Thêm thành côcng']);
    }
 
}
