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
                    <h1>Thêm loại thực đơn</h1>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content mt-3">
        <div class="animated fadeIn" >
        <div class="card">
                        <form action="{{route('create_tf')}}" method="post" enctype="multipart/form-data"
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
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id parent</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="idparent" name="idparent"
                                            placeholder="Text" class="form-control" value="0"></div>
                                </div>
                               
                               
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" >
                                    <i class="fa fa-dot-circle-o"></i> Thêm
                                </button>
                            </div>
                        </form>
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
@endsection