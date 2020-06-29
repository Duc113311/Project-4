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
                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#largeModal">
    
                            Thêm món ăn
                        </button>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content mt-3">
        <div class="animated fadeIn" >
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
                                        <a href="{{URL::to('/xacnhanban/'.$i->id)}}">
                                        <button>Xác nhận</button>
                                        </a>
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
    
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <form action="" method="post" enctype="multipart/form-data"
                            class="form-horizontal">
                            {{ csrf_field()}}
                            <div class="card-header">
                                <strong>Thêm</strong> Món Ăn
                            </div>
                            <div class="card-body card-block">
    
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên món
                                            ăn</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name_menu" name="name_menu"
                                            placeholder="Text" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô
                                            tả</label></div>
                                    <div class="col-12 col-md-9"><textarea name="desc_food" id="desc_food" rows="9"
                                            placeholder="Content..." class="form-control"></textarea></div>
                                </div>
                               
    
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh</label></div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="Image" id="Image" class="form-control" readonly>
                                                <button class="mt-1 mb-1 btn btn-button-1" id="btnChooseImage">Choose image</button>
                                                <div id="show_image"></div>
                                            </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class="form-control-label">Đơn Giá</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input id="price" name="price" type="text" class="form-control" aria-required="true"
                                            aria-invalid="false">
                                    </div>
                                </div>
                               
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" id="btnThem">
                                    <i class="fa fa-dot-circle-o"></i> Thêm
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="largeModal1" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <form action="" method="post" enctype="multipart/form-data"
                        class="form-horizontal">
                   
                        <div class="card-header">
                            <strong>Sửa</strong> Món Ăn
                        </div>
                        <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên món
                                        ăn</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="name_menu_edit" name="name_menu"
                                        placeholder="Text" class="form-control" value=""></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô
                                        tả</label></div>
                                <div class="col-12 col-md-9"><textarea name="desc_food" id="desc_food_edit" rows="9"
                                        placeholder="Content..." class="form-control"></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="Image_edit" id="Image_edit" class="form-control" readonly>
                                            <button class="mt-1 mb-1 btn btn-button-1" id="btnChooseImageEdit">Choose image</button>
                                            <div id="show_image_edit"></div>
                                        </div>
                              
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class="form-control-label">Đơn Giá</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="price_edit" name="price" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" id="btnSua">
                                <i class="fa fa-dot-circle-o"></i> Sửa
                            </button>
                            <input type="hidden" id="food_id" name="food_id" value="">
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>
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

@endsection