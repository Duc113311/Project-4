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
                            
                            <tbody id="vs-list" class="list_food" name='vs-lis'>
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
                                        <a href="#"><i style="font-size: 22px;color:#607d5f;padding-right: 13px;"
                                                class="fa fa-edit"></i></span></a>
                                        <a href="#"><i style="font-size: 22px;color:#82481f;padding-right: 13px;"
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
                                <!-- <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div> -->
                                <div class="form-group">
                                    <label for="">Ảnh:</label>
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
                                <i class="fa fa-dot-circle-o"></i> Submit
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