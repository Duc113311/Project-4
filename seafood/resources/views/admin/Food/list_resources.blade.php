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

                            Thêm nguyên liệu
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
                            <strong class="card-title">Nguyên liệu chế biến</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên nguyên liệu</th>
                                        <th scope="col">Hình Ảnh</th>
                                        <th scope="col">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($datas)
                                    @foreach($datas as $v)
                                    <tr id="v{{$v->id}}">
                                        <th> {!!$v->stt !!}</th>
                                        <td>
                                            <div title="{{$v->parent}}" id="name_resv{{$v->id}}">
                                                {!! $v->name_res !!}
                                            </div>
                                        </td>
                                        <td id="image{{$v->id}}">
                                            <img src="{{$v->image}}" alt="image" width="50px;" height="50px;">
                                        </td>
                                        <td>
                                            <a href="/edit_res/{{$v->id}}" data-toggle="modal" data-target="#largeModal1"><istyle="font-size: 22px;color:#607d5f;padding-right: 13px;" class="fa fa-edit"></i></span></a>
                                            <a href="#" class="btnDelete" data-url="/delete_res/{{$v->id}}"><i
                                                    style="font-size: 22px;color:#82481f;padding-right: 13px;"
                                                    class="fa fa-times"></i></span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endisset
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

                <div class="modal-body">
                    <div class="card">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field()}}
                            <div class="card-header">
                                <strong>Thêm</strong> Nguyên liệu
                            </div>
                            <div class="card-body card-block">

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên
                                            nguyên liệu</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name_res" name="name_res"
                                            placeholder="Nhập tên" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class="form-control-label">Loại
                                            nguyên liệu</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="idparent" id="idparent" class="form-control">
                                            @foreach($res_t as $item)
                                            <option value="{{$item->id}}">{{$item->name_res}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input"
                                            class=" form-control-label">Ảnh</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="Image" id="Image" class="form-control" readonly>
                                        <button class="mt-1 mb-1 btn btn-button-1" id="btnChooseImage">Choose
                                            image</button>
                                        <div id="show_image"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" id="btnThem_res">
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


    <div class="modal fade" id="largeModalloai" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="card">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field()}}
                            <div class="card-header">
                                <strong>Thêm</strong>Loại Nguyên Liệu
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên
                                            nguyên liệu</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name_res" name="name_res"
                                            placeholder="Nhập tên" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên
                                            nguyên liệu</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="idparent" name="idparent"
                                            placeholder="Nhập tên" class="form-control"></div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" id="btnThem_res_type">
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

</div>
</div>
@endsection
@section('js')
<script src="{{url('editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('editor/ckfinder/ckfinder.js')}}"></script>

<script src="{{url('sweetalert/package/dist/sweetalert2.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script type="text/javascript">
    var res_ty = {
        init: function ()//init: khởi tạo 1 project mới, hàm mới
        {
            res_ty.registersEvent();
        },
        registersEvent: function () {
            $('#btnThem_res').off('click').on('click', function (event) {
                event.preventDefault();//Ngăn chặn các liên kết khác , chỉ cho trỏ đến sự kiện mik bắt
                res_ty.AddRes_Food();
            });
            $('#btnThem_res_type').off('click').on('click', function (event) {
                event.preventDefault();//Ngăn chặn các liên kết khác , chỉ cho trỏ đến sự kiện mik bắt
                res_ty.Addtype_Food();
            });

            $(document).off('click', '.btnDelete').on('click', '.btnDelete', function (event) {
                event.preventDefault();
                var url = $(this).data('url');
                console.log(url);
                Swal.fire({
                    title: "Xóa sản phẩm ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.value) {
                        res_ty.Delete_Food(url);
                    }
                })

            });

            $('#btnChooseImage').on('click', function (event) {
                event.preventDefault();
                var url = "{!!url('/')!!}";
                CKFinder.modal({
                    chooseFiles: true,
                    width: 1200,
                    height: 700,
                    onInit: function (finder) {
                        finder.on('files:choose', function (evt) {
                            var file = evt.data.files.first();
                            var img_path = file.getUrl();
                            var img_input_path = img_path.replace(url, '');
                            $("input[name='Image']").val(img_input_path);
                            var img_html = `<img src="${img_path}" alt="" height="150px" style="border: 2px solid #5f27cd">`;
                            $('#show_image').html(img_html);
                        });
                    }
                });
            });
        },

        Addtype_Food:function(){
            var url="{!!route('creat_t')!!}";
            
            $.ajax({
                url:url,
                type:'POST',
                dataType:'json',
                data:{
                    "_token": "{{ csrf_token() }}",
                    name_res:$('#name_res').val(),
                    idparent:$('#idparent').val()
                },
                success:function(data){
                    if(data.status==true)
                    {
                        alertify.success("Thêm thành công");
                        $('.modal-backdrop').css('display', 'none');
                        $('#largeModalloai').css('display', 'none');
                        // setTimeout(function () {
                        //     window.location.reload();
                        // }, 1000);
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        },
        AddRes_Food: function () {
            var url = "{!!route('creat_reso')!!}";// Khởi tạo biến trỏ đến cái route cần thực hiện
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    name_res: $('#name_res').val(),
                    idparent: $('#idparent').val(),
                    Image: $('#Image').val()
                },
                success: function (data) {
                    if (data.status == true) {
                        alertify.success("Thêm thành công");
                        $('.modal-backdrop').css('display', 'none');
                        $('#largeModal').css('display', 'none');
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        },
        Delete_Food: function (url) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (res) {
                    if (res.status == true) {
                        alertify.success("Xóa thành công");
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });

        }
    };
    res_ty.init();
</script>
@endsection