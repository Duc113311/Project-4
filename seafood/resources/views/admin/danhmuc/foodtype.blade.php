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
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody id="vs-list" name='vs-lis'>
                                   
                                    @foreach($food as $key=>$value)
                                        <tr>
                                            <td>
                                           {{$key++}}
                                            </td>
                                            
                                            <td>
                                            <div title="">
                                           {{$value->name_menu}}
                                            </div>
                                            </td>

                                            <td id="">
                                             {{$value->idparent}}
                                            </td>
                                            <td>
                                                <a href=""class="btn btn-primary">Sửa
                                                 </a>
                                                 <a href="" class="btn btn-warning">Xóa</a>
                                                
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
         
@endsection
