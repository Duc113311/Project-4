@extends('admin_layout');
@section('admincontent')
<div class="col-lg-12">
<div class="card">
                            <div class="card-header">
                                <strong>Thêm Danh Mục</strong> Đồ Ăn Uống
                               
                            </div>
                            <div class="card-body card-block">
                                <form action="{{URL::to('/addmimage')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                  {{ csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="name_menu" class=" form-control-label">Tên Danh Mục</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="name_menu" name="name_menu" placeholder="Nhập tên danh mục" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Parent</label></div>
                                        <div class="col-12 col-md-9">

                                        <select name="idparent" id="idparent">
                                            @foreach($category as $key=>$itn)
                                             <option value="{{$itn->id}}">{{$itn->name_menu}}</option>
                                             @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Hình ảnh</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="name" name="image" class="form-control-file"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="desc_food" name="desc_food" placeholder="Nhập idparent" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Đơn giá</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="price" placeholder="Nhập đơn giá" class="form-control"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Thêm
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                                </form>
                                
                            <div class="card-footer">
                                
                            </div>
                        </div>
</div>
@endsection