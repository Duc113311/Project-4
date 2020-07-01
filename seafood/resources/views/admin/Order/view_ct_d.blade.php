   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <link rel="stylesheet" href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}">
    <style>
       .card .form_body{
            padding: 16px;
}
        }
     .content .card .form_body .title_hd{
            
        }
        }
        .body_content{
            padding: 0 10px;
        }
        .ghichu{
            padding: 0 10px;
            text-align: center;
        }
        .name_nv{
            padding: 0 10px;
        }
        .foot_content{

        }
    </style>
   </head>
   <body>
   <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="container">
                <div class="col-md-12">
                <div class="card">
                           <div class="form_body">
                           @foreach($orders as $or_c)
                                <div class="title_hd" style="text-align: center;padding: 0 10px;">
                                     <img src="{{asset('fontend\images\logo1.jpg')}}" width="100px" alt="">
                                     <h3>NHÀ HÀNG SEAFOOD</h3>
                                     <p>Quận Hai Bà Trưng, Đống Đa - TP. Hà Nội</p>
                                      <h4><b>HOÁ ĐƠN ĐẶT HÀNG</b></h4>
                                      <p><b>MS:{{$or_c->id}}</b></p>
                                </div>
                                <div class="body_content" style=" padding: 0 10px;">
                                    <div class="time_start">
                                          <p><b>Người mua hàng:{{$or_c->name_cus}}</b> </p>
                                          <p><b>Địa chỉ giao: {{$or_c->address}}</b></p>
                                          <p><b>Số điện thoại: {{$or_c->phone}}</b></p>
                                    </div>
                                    @endforeach
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" >Tên Món</th>
                                                    <th scope="col" >Hình Ảnh</th>
                                                    <th scope="col">Số Lượng</th>
                                                    <th scope="col">Đơn giá</th>
                                                    <th scope="col">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order_details as $hd=>$item)
                                                <tr>
                                                    <td scope="row">
                                                    {{$item->name_menu}}
                                                    </td>
                                                    <td><img style="width: 93px;" src="{{$item->image}}" alt="" srcset="" width="200px;"></td>
                                                    <td>{{$item->qty}}</td>
                                                    <td>{{number_format($item->price)}}đ</td>
                                                    <td>{{number_format($item->price)}}đ</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                
                                    <div class="foot_content">
                                    @foreach($orders as $or_c)
                                    <h5>Thanh toán: {{number_format($or_c->totail)}} VNĐ</h5>
                                   @endforeach
                                    </div>
                                   
                                </div>
                                <div class="name_nv" style=" padding: 0 10px;">
                                <h5>Thu Ngân: {{Auth::user()->name}}</h5>
                                </div>
                                <div class="ghichu">
                                    <p style="black;">Nhận hàng kiểm tra và thanh toán</p>
                                </div>
                           </div>
                       
                    </div>
                </div>
           
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
   </body>
   </html>
   

</div>
</div>

