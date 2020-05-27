@extends('admin_layout');
@section('admincontent')
<div class="col-lg-12">
<div class="card">
                            <div class="card-header">
                                <strong>Sửa Danh Mục</strong> Đồ Ăn Uống
                               
                            </div>
                            <div class="card-body card-block">
                                <form action="/updateimage/{{$category->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                  {{ csrf_field()}}
                                  {{method_field('PUT')}}
                                  <input type="hidden" name="id" id="id" value="{{$category->id}}">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="name_menu" class=" form-control-label">Tên Danh Mục</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="name_menu" value="{{$category->name_menu}}" name="name_menu" placeholder="Nhập tên danh mục" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Parent</label></div>
                                        <div class="col-12 col-md-9">
                                           <select name="idparent" id="idparent">
                                            @foreach($categories as $key=>$itnl)
                                            @if($itnl->id==$category->idparent){
                                                <option selected="selected" value="{{$itnl->id}}">{{$itnl->name_menu}}</option>
                                            }
                                            @else{
                                                <option  value="{{$itnl->id}}">{{$itnl->name_menu}}</option>
                                            }
                                            @endif
                                             @endforeach
                                            </select>
                                        </div>
                                    </div>

                                   </select>
                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Hình ảnh</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="image" value="{{$category->image}}" name="image" class="form-control-file">
                                 <img src="{{URL::to('/backend/images/'.$category->image)}}" alt="" srcset="" style="width: 84px; margin-top: 8px;">
                                </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả</label></div>
                                        <div class="col-12 col-md-9">
                                        <textarea cols="30" rows="10"  id="desc_food"  name="desc_food" style="width: 100%;height: 102px;border-radius: 4px;border: 1px solid #1280ce61;">{{$category->desc_food}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Đơn giá</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="price" value="{{$category->price}}" name="price" placeholder="Nhập đơn giá" class="form-control"></div>
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