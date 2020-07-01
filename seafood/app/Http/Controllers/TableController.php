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

    public function get_table_xh()
    {
        $book_table=DB::table('book_table')->where('status',0)->get();
        foreach($book_table as $i1)
        {
            $valu=DB::table('tbl_table')->where('tbl_table.id',$i1->id)->get();
            $i1->f_order=$valu;
        }
        return view('admin.Book_Table.view_table_chua_xn',['book_table'=>$book_table]);
    }

    public function table_xacnhan($id)
    {
        DB::table('book_table')->where('id',$id)->update(['status'=>1]);
        return redirect()->route('get_xacnhandon');
    }
    public function view_table_xh()
    {
        $category=DB::table('tbl_category')->where('idparent','!=',0)->get();
        $book_table=DB::table('book_table')->where('status',1)->get();
        foreach($book_table as $i1)
        {
            $valu=DB::table('tbl_table')->where('tbl_table.id',$i1->id)->get();
            $i1->f_order=$valu;
        }
        return view('admin.Book_Table.view_table_xn',['book_table'=>$book_table])->with('category',$category);
    }

    public function postOrderFood(Request $request, $id)
    {
        // dd($request->data);
        foreach ($request->data as $key => $value) {
        // dd($value);
            $dataInsert=[
                "id_book_table"=>$id,
                "id_category"=>$value,
                "qty"=>1
            ];
        DB::table('book_detail')->insert($dataInsert);
            
        }
        return response([
            'status'=>true
        ]);
    }
 
}
