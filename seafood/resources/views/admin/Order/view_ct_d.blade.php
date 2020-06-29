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
                           <div class="form_body">
                           @foreach($orders as $or_c)
                                <div class="title_hd">
                                     <img src="{{asset('fontend\images\logo1.jpg')}}" width="100px" alt="">
                                     <h3>NHÀ HÀNG SEAFOOD</h3>
                                     <p>Quận Hai Bà Trưng, Đống Đa - TP. Hà Nội</p>
                                      <h4><b>HOÁ ĐƠN ĐẶT HÀNG</b></h4>
                                      <p><b>MS:{{$or_c->id}}</b></p>
                                </div>
                                <div class="body_content">
                                    <div class="time_start">
                                          <p><b>Người mua hàng:{{$or_c->name_cus}}</b> </p>
                                          <p><b>Địa chỉ giao: {{$or_c->address}}</b></p>
                                          <p><b>Số điện thoại: {{$or_c->phone}}</b></p>
                                    </div>
                                    @endforeach
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" >Tên Món</th>
                                                    <th scope="col" >Hình Ảnh</th>
                                                    <th scope="col">SL</th>
                                                    <th scope="col">Đơn giá</th>
                                                    <th scope="col">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order_details as $hd=>$item)
                                                <tr>
                                                    <td scope="row">
                                                    {{$item->name_menu}}
                                                    </td>
                                                    <td></td>
                                                    <td>{{$item->qty}}</td>
                                                    <td>{{number_format($item->price)}}</td>
                                                    <td>{{number_format($item->price)}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                
                                    <div class="foot_content">
                                    @foreach($orders as $or_c)
                                    <p>Tổng Cộng:{{number_format($or_c->totail)}} đ <b></b></p>
                                    <p>Thanh toán: {{number_format($or_c->totail)}} đ<b></b></p>
                                   @endforeach
                                    </div>
                                   
                                </div>
                                <div class="name_nv">
                                <h5>Thu Ngân: Vũ QUỲNH ANH</h5>
                                </div>
                                <div class="ghichu">
                                    <p style="black;">Nhận hàng kiểm tra và thanh toán</p>
                                </div>
                           </div>
                       
                    </div>
                </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

</div>
</div>
@endsection

@section('js')
<script src="{{url('editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('editor/ckfinder/ckfinder.js')}}"></script>

<script src="{{url('sweetalert/package/dist/sweetalert2.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script type="text/javascript">
</script>
@endsection