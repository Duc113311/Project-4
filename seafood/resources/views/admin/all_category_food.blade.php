@extends('admin_layout');
@section('admincontent')

            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>

                            </div>
                            <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Thực Đơn</th>
                                            <th>ID </th>
                                            <th>Ảnh</th>
                                            <th>Mô tả</th>
                                            <th>Đơn giá</th>
                                            <th>Chức năng</th>
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

                                            <td id="idparentv{{$v->id}}">
                                             {{$v->idparent}}
                                            </td>

                                            <td id="image{{$v->id}}">
                                                <img src="{{asset('backend/images/'.$v->image )}}" alt="image" width="50px;" height="50px;">
                                            
                                            </td>

                                            <td id="desc_food{{$v->id}}">
                                            {{$v->desc_food}}
                                            </td>

                                            <td id="price{{$v->id}}">
                                            {{$v->price}} đ
                                            </td>
                                            <td>
                                                <a href="/editimage/{{$v->id}}"class="btn btn-primary">Sửa
                                                 </a>
                                                 <a href="/deleteimage/{{$v->id}}" class="btn btn-warning">Xóa</a>
                                                
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
         
@endsection
