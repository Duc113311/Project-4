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
                                        <th>Tiêu Đề</th>
                                        <th>Hình Ảnh</th>
                                        <th>Ngày Thêm</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                
                                <tbody id="vs-list" name='vs-lis'>
                                   @foreach($news_food as $key=>$item)
                                    <tr>
                                        <td>
                                          {{$key++}}
                                        </td>
                                        <td>
                                          {{$item->title_news}} 
                                        </td>
                                        <td >
                                            <img src="{{$item->image_news}}" alt="image" width="50px;"
                                                height="50px;">
                                        </td>
                                        <td >
                                        {{date('d/m/y H:i',strtotime($item->created_at))}}
                                        </td>
                                        <td>
                                        <a href="#"><i style="font-size: 22px;color: blue;padding-right: 13px;"
                                                    class="fa fa-eye"></i></span></a>
                                        <a href="#" data-url="/edit_news/{{$item->id}}" data-toggle="modal" data-target="#largeModal1" class="btnEdit"><i style="font-size: 22px;color:#607d5f;padding-right: 13px;"
                                                    class="fa fa-edit"></i></span></a>
                                            <a href="#" data-url="/delete_news/{{$item->id}}" class="btnDelete"><i style="font-size: 22px;color:#82481f;padding-right: 13px;"
                                                    class="fa fa-times"></i></span></a>
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
                                <strong>Thêm</strong> Tin Tức
                            </div>
                            <div class="card-body card-block">
    
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tiêu đề</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="title_news" name="title_news"
                                            placeholder="Text" class="form-control"></div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô
                                            tả</label></div>
                                    <div class="col-12 col-md-9"><textarea name="content_news" id="content_news" rows="9"
                                            placeholder="Content..." class="form-control"></textarea></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh</label></div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="image_news" id="image_news" class="form-control" readonly>
                                                <button class="mt-1 mb-1 btn btn-button-1" id="btnChooseImage">Chọn ảnh</button>
                                                <div id="show_image"></div>
                                            </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" id="btnThem">
                                    <i class="fa fa-dot-circle-o"></i> Thêm
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
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tiêu đề</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="title_news" name="title_news"
                                            placeholder="Text" class="form-control"></div>
                                </div>
                               
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô
                                            tả</label></div>
                                    <div class="col-12 col-md-9"><textarea name="content_news" id="content_news" rows="9"
                                            placeholder="Content..." class="form-control"></textarea></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh</label></div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="image_news_edit" id="image_news" class="form-control" readonly>
                                                <button class="mt-1 mb-1 btn btn-button-1" id="btnChooseImage">Chọn ảnh</button>
                                                <div id="show_image"></div>
                                            </div>
                                </div>
                            </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" id="btnSua">
                                <i class="fa fa-dot-circle-o"></i> Sửa
                            </button>
                            <input type="hidden" id="food_id" name="food_id" value="">
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
                            $("input[name='image_news']").val(img_input_path);
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
                            $("input[name='image_news_edit']").val(img_input_path);
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
                    
                    var url = `/update_news/${id}`;
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
                if(url != "")
                    food.EditFood(url);
            });
        },
        AddFood: function() {
            var url = "{!! route('create_n') !!}";
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    title_news: $('#title_news').val(),
                    image_news: $('#image_news').val(),
                    content_news: $('#content_news').val()
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
                        $('#title_news').val(data.food.title_news);
                        $('#image_news').val(data.food.image_news);
                        $('#content_news').val(data.food.content_news);
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
                    title_news: $('#title_news').val(),
                    image_news: $('#image_news').val(),
                    content_news: $('#content_news').val()
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