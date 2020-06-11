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
                                        <th>Tên Món Ăn</th>
                                        <th>Hình Ảnh</th>
                                        <th>Đơn giá</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                
                                <tbody id="vs-list" name='vs-lis'>
                                    @isset($datas)
                                    @foreach($datas as $v)
                                    <tr id="v{{$v->id}}">
                                        <td>
                                            {{$v->stt}}
                                        </td>
    
                                        <td>
                                            <div title="{{$v->painted}}" id="name_menuv{{$v->id}}">
                                                {!! $v->name_menu !!}
                                            </div>
                                        </td>
                                        <td id="image{{$v->id}}">
                                            <img src="{{$v->image}}" alt="image" width="50px;"
                                                height="50px;">
    
                                        </td>
                                        <td id="price{{$v->id}}">
                                            {{number_format($v->price)}} đ
                                        </td>
                                        <td>
                                            <a href="#"><i style="font-size: 22px;color: blue;padding-right: 13px;"
                                                    class="fa fa-eye"></i></span></a>
                                            <a href="#" data-url="/edit_food/{{$v->id}}" data-toggle="modal" data-target="#largeModal1" class="btnEdit"><i style="font-size: 22px;color:#607d5f;padding-right: 13px;"
                                                    class="fa fa-edit"></i></span></a>
                                            <a href="#" data-url="/deleteimage/{{$v->id}}" class="btnDelete"><i style="font-size: 22px;color:#82481f;padding-right: 13px;"
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
                                    <div class="col col-md-3"><label for="select" class="form-control-label">Loại
                                            món</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="idparent" id="idparent" class="form-control">
                                            @foreach($cate as $key=>$item)
                                            <option value="{{$item->id}}">{!!$item->name_menu!!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
    
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh</label></div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="Image" id="Image" class="form-control" readonly>
                                                <button class="mt-1 mb-1 btn btn-button-1" id="btnChooseImage">Choose image</button>
                                                <div id="show_image"></div>
                                            </div>
                                    <!-- <div class="form-group">
                                        <label for="">Ảnh:</label>
                                        <input type="text" name="Image" id="Image" class="form-control" readonly>
                                        <button class="mt-1 mb-1 btn btn-button-1" id="btnChooseImage">Choose image</button>
                                        <div id="show_image"></div>
                                    </div> -->
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
                        {{ csrf_field()}}
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
                                <div class="col col-md-3"><label for="select" class="form-control-label">Loại
                                        món</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="idparent" id="idparent_edit" class="form-control">
                                        @foreach($cate as $key=>$item)
                                        @if($item->id==$item->idparent){
                                            <option value="{{$item->id}}">{{$item->name_menu}}</option>
                                        }
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="Image_edit" id="Image_edit" class="form-control" readonly>
                                            <button class="mt-1 mb-1 btn btn-button-1" id="btnChooseImageEdit">Choose image</button>
                                            <div id="show_image_edit"></div>
                                        </div>
                                <!-- <div class="form-group">
                                    <label for="">Ảnh:</label>
                                    <input type="text" name="Image" id="Image" class="form-control" readonly>
                                    <button class="mt-1 mb-1 btn btn-button-1" id="btnChooseImage">Choose image</button>
                                    <div id="show_image"></div>
                                </div> -->
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
<script type="text/javascript">
    var food = {
        init: function() {
            food.registersEvent();
        },
        registersEvent: function() {

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

            $('#btnChooseImageEdit').on('click', function (event) {
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
                            $("input[name='Image_edit']").val(img_input_path);
                            var img_html = `<img src="${img_path}" alt="" height="150px" style="border: 2px solid #5f27cd">`;
                            $('#show_image_edit').html(img_html);
                        });
                    }
                });
            });

            //Click thêm
            $('#btnThem').off('click').on('click', function(event) {
                event.preventDefault();
                food.AddFood();
            });

            //Click update sản phẩm
            $(document).off('click', '#btnSua').on('click', '#btnSua', function(event) {
                event.preventDefault();
                var id = $('#food_id').val();
                if(id != "")
                {
                    var url = `/update_food/${id}`;
                    food.UpdateFood(url);
                }
            });

            //Click xóa sản phẩm
            $(document).off('click', '.btnDelete').on('click', '.btnDelete', function(event) {
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
                        food.DeleteFood(url);
                    }
                })
            });

            //Click edit sản phẩm
            $(document).off('click','.btnEdit').on('click','.btnEdit',function(event) {
                var url = $(this).data('url');
                // var options = $('#idparent_edit option');
                // $.each(options, function(index, value) {
                //     var id_parent = value;
                    // console.log(id_parent);
                    
                });
                // if(url != "")
                //     food.EditFood(url);
            });
        },
        AddFood: function() {
            var url = "{!! route('createf') !!}";
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    name_menu: $('#name_menu').val(),
                    idparent: $('#idparent').val(),
                    desc_food: $('#desc_food').val(),
                    Image: $('#Image').val(),
                    price: $('#price').val()
                },
                success: function(data) {
                    if(data.status == true)
                    {
                        alertify.success("Thêm thành công");
                        $('.modal-backdrop').css('display', 'none');
                        $('#largeModal').css('display', 'none');
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function(err) {
                    console.log(err);
                    
                }
            });
        },
        EditFood: function(url) {
            $.ajax({
                url: url,
                type:'GET',
                dataType: 'json',
                success: function(data) {
                    if(data.status == true)
                    {
                        $('#name_menu_edit').val(data.food.name_menu);
                        $('#desc_food_edit').val(data.food.desc_food);
                        $('#price_edit').val(data.food.price);
                        $('#food_id').val(data.food.id);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        },
        UpdateFood: function(url) {
            $.ajax({
                url: url,
                type: 'PUT',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    name_menu: $('#name_menu_edit').val(),
                    idparent: $('#idparent_edit').val(),
                    desc_food: $('#desc_food_edit').val(),
                    Image: $('#Image_edit').val(),
                    price: $('#price_edit').val()
                },
                success: function(data) {
                    if(data.status == true)
                    {
                        alertify.success("Sửa thành công");
                        $('.modal-backdrop').css('display', 'none');
                        $('#largeModal1').css('display', 'none');
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        },
        DeleteFood: function(url) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    if(res.status == true)
                    {
                        alertify.success("Xóa thành công");
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    };
    food.init();
</script>
@endsection