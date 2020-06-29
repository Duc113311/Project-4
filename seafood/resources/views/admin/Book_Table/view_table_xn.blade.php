@extends('admin_layout')
@section('css')
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />


<link rel="stylesheet" href="{{url('sweetalert/package/dist/sweetalert2.min.css')}}" />

@endsection
@section('content')
<div class="all">
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                            data-target="#largeModal">

                            Thêm món ăn
                        </button>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Số Khách</th>
                                        <th>Ngày Ăn</th>
                                        <th>Thời gian</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>

                                @foreach($book_table as $i)
                                <tr>
                                    <td>{{$i->id}}</td>
                                    <td>{{$i->name_customer}}</td>
                                    <td>{{$i->Number_customer}}</td>
                                    <td>{{$i->order_date}}</td>
                                    <td>
                                        @if($i->time_order==1)
                                        <b>Sáng</b>
                                        @elseif($i->time_order==2)
                                        <b>Trưa</b>
                                        @elseif($i->time_order==3)
                                        <b>Chiều</b>
                                        @endif
                                    </td>
                                    <td>
                                   
                                        <a href="#" data-url="{{$i->id}}" data-toggle="modal" data-target="#largeModal" class="orderFood"><i style="font-size: 22px;color:#607d5f;padding-right: 13px;"
                                                    class="fa fa-edit"></i></span></a>
                                    </td>
                                </tr>
                                @endforeach
                                <tbody id="vs-list" name='vs-lis'>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->


</div>
</div>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post"></form>
            {{ csrf_field()}}
            <div class="modal-body">
                <div class="col col-md-9">
                    <div class="form-check">
                        @foreach($category as $item)
                        <div class="checkbox">
                            <label for="checkbox1" class="form-check-label ">
                                <input type="checkbox" id="name_menu" onclick="orderfood({{$item->id}})" name="name_menu" value="{{$item->id}}"
                                    class="form-check-input">{{$item->name_menu}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
      
             <input type="button" onclick="Add_Food_table()" value="Luu">
               
            </div>
</form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{url('editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('editor/ckfinder/ckfinder.js')}}"></script>

<script src="{{url('sweetalert/package/dist/sweetalert2.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script type="text/javascript">
let listFood=[];
let idTable='';
var food = {
        init: function() {
            food.registersEvent();
        },
        registersEvent: function() {
            //Click thêm
            
            $(document).off('click','.orderFood').on('click','.orderFood',function(event) {
                var url = $(this).data('url');
                console.log(url);
                idTable=url;
              
            });            
        },
       
        },
      
       
      
        
    };
    food.init();





    Add_Food_table=()=>{
        console.log(idTable, listFood)
        $.ajax({
                url: '/view_thucdon_dat/'+idTable,
                type: 'POST',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                   data:listFood
                },
                success: function(data) {
                    console.log(data)
                },
                error: function(err) {
                    console.log(err);
                    
                }
            });
    }
  
    orderfood=(id)=>{
        listFood.push(id);
        

    }
   
</script>
@endsection