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
                            <strong class="card-title">Danh sách đơn hàng</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
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
                                   @foreach($ord_cus as $i)
                                    <tr>
                                        <td>
                                          {{$i->id}} 
                                        </td>
                                        <td>
                                        {{$i->date}}
                                        </td>
                                        <td>
                                         {{ $i->name_cus}}
                                        </td>
                                        <td>
                                        {{ $i->totail}} 
                                        </td>
                                        <td>
                                                    <a href="{{URL::to('/view_ct_don_onl/'.$i->id)}}" >
                                                    <button type="button" data-toggle="modal" data-target="#largeModalView"  class="btn btn-warning">Xem chi tiết</button>
                                                    </a>
                                                    <a href="{{URL::to('/xacnhandon/'.$i->id)}}">
                                                    <button type="button" class="btn btn-warning">Xác nhận</button>
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