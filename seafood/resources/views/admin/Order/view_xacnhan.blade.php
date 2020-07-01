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
                    <h1>Danh sách</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <button style="margin-right: 5px;" type="button" class="btn btn-primary mb-1"
                            data-toggle="modal" data-target="#largeModal">

                            Thêm Đơn Hàng
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
                            <strong class="card-title">Danh sách đơn hàng đã Xác Nhận</strong>
                        </div>
                        <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã Đơn Hàng</th>
                                        <th scope="col">Ngày Giao</th>
                                        <th scope="col">Tên khách hàng</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Chứa năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($ord_xacnhan as $i)
                                    <tr>
                                        <td>
                                          {{$i->id}} 
                                        </td>
                                        <td>
                                        {{date('d/m/Y', strtotime($i->date))}}
                                        </td>
                                        <td>
                                         {{ $i->name_cus}}
                                        </td>
                                        <td>
                                        {{number_format($i->totail)}} VNĐ 
                                        </td>
                                        <td>
                                                    <a href="#">
                                                    <button type="button" data-toggle="modal" data-target="#largeModalView" id="btnViewct" data-id="{{$i->id}}" class="btn btn-warning">Xem chi tiết</button>
                                                    </a>
                                                    <a href="{{URL::to('/chebienxong/'.$i->id)}}">
                                                    <button type="button" class="btn btn-warning">Chế biến xong</button>
                                                    </a>
                                                    <a href="{{URL::to('/chuaxacnhan/'.$i->id)}}">
                                                    <button class="btn btn-danger" type="button">Hủy</button>
                                                    </a>
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->


    <div class="modal fade ctdonhang" id="largeModalView" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                           <div class="form_body">
                                <div class="title_hd">
                                     <img src="{{asset('fontend\images\logo1.jpg')}}" width="100px" alt="">
                                     <h3>NHÀ HÀNG SEAFOOD</h3>
                                     <p>Quận Hai Bà Trưng, Đống Đa - TP. Hà Nội</p>
                                      <h4><b>HOÁ ĐƠN ĐẶT HÀNG</b></h4>
                                      <p><b>MS:</b></p>
                                </div>
                                <div class="body_content">
                                    <div class="time_start">
                                          <p><b>Người mua hàng:</b> </p>
                                          <p><b>Địa chỉ giao: </b></p>
                                          <p><b>Số điện thoại</b></p>
                                    </div>
                                    <div class="list_content">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Tên Món</th>
                                                    <th>SL</th>
                                                    <th>Đơn giá</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">Cá</td>
                                                    <td>2</td>
                                                    <td>240000</td>
                                                    <td>250000</td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="foot_content">
                                    <p>Tổng Cộng: <b></b></p>
                                    <p>Thanh toán: <b></b></p>
                                    </div>
                                </div>
                                <div class="name_nv">
                                <h5>Thu Ngân: Vũ QUỲNH ANH</h5>
                                </div>
                                <div class="ghichu">
                                    <p style="black;">Nhận hàng kiểm tra và thanh toán</p>
                                </div>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
var order_food={
    init:function(){
        order_food.registersEvent();
    },
    registersEvent:function(){
        $(document).off('click','#btnViewct').on('click','#btnViewct',function(event){
            var id_order=$(this).data(id);
            if(id_order !="")
            order_food.ViewOrder();
            
        });
    },
    ViewOrder:function(id_order){
        var url="{!!route('view_order')!!}";
        $.ajax({
            url:url,
            type:'GET',
            dataType:'json',
            data:{
                id_order:id_order
            },
            success:function(res)
            {
               
            }
        });
    }
}
</script>
@endsection