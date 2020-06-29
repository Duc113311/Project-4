<!DOCTYPE html>
<html>

<head>
    @include('pages.header')
    <!-- start-smoth-scrolling -->
</head>
<style>
    .nav-pills>li {
        padding-left: 90px !important;
    }
</style>

<body>
    <!-- header -->


    @include('pages.nvabar')
    <!-- main-slider -->

    <div class="products header-area1">
        <div class="container">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-check-circle"></i> Chờ Xác
                        nhận</a></li>
                <li><a data-toggle="pill" href="#menu1"><i class="fa fa-truck-moving"></i>Chờ lấy hàng</a></li>
                <li><a data-toggle="pill" href="#menu4"><i class="fa fa-utensils"></i>Đang chế biến</a></li>
                <li><a data-toggle="pill" href="#menu2"><i class="fa fa-truck"></i>Đang Giao</a></li>
                <li><a data-toggle="pill" href="#menu3"><i class="fa fa-window-close"></i>Đã Hủy</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                @foreach($ord_cus as $i)
                    <div class="body_cart_cancel">
                        <div class="row f_ct_don">
                            <div class="col-12 title_f_ct_don">
                                <div class="col-lg-4 f_code_don">
                                    <ul>
                                        <li>Mã đơn hàng:<b>{{$i->id}} </b> </li>
                                        <li>Ngày Giao:<b>{{$i->date}}</b> </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 f_code_don" >
                                    <ul>
                                        <li>Số điện thoại:<b>{{$i->phone}}</b></li>
                                        <li>Người nhận:<b>{{$i->name_cus}}</b></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 f_code_don">
                                    <ul>
                                        <li style="text-align: right;">
                                        <a href="{{URL::to('/gio-hang/trang_thai_don/'.$i->id)}}">
                                <button>Huy</button></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                           
                            <div class="col-12 body_f_ct_don">
                            @foreach($i->f_order as $item)
                                <div class="col-lg-4">
                                    <div class="ct_img_cart">
                                        <img src="{{URL::to(''.$item->image)}}" alt="" srcset="" style="width:100px;">
                                    </div>
                                    <div class="cont_cart">
                                    <div class="name_food_c">
                                 <b>{{$item->name_menu}}</b> 
                                </div>
                                <div class="food_quanty">
                                  x {{$item->qty}}
                                </div>
                                <div class="type_food_c">
                                {{number_format($item->price)}} đ
                                </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          
                            <div class="col-12 footer_f_ct">
                                <div class="col-lg-6">
                                    <a href="#">
                                        <button>Quay lai Shop</button>
                                    </a>
                                </div>
                                <div class="col-lg-6" style="text-align: right;">
                                    <h4>{{number_format($i->totail)}} đ</h4>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    @endforeach
                </div>


                <div id="menu1" class="tab-pane fade">
                @foreach($ord_cus as $i)
                    <div class="body_cart_cancel">
                        <div class="row f_ct_don">
                            <div class="col-12 title_f_ct_don">
                                <div class="col-lg-4 f_code_don">
                                    <ul>
                                        <li>Mã đơn hàng:{{$i->id}} </li>
                                        <li>Ngày Giao:{{$i->date}} </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 f_code_don" >
                                    <ul>
                                        <li>Số điện thoại:{{$i->phone}}</li>
                                        <li>Người nhận:{{$i->name_cus}}</li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 f_code_don">
                                    <ul>
                                        <li style="text-align: right;">
                                        <a href="{{URL::to('/gio-hang/trang_thai_don/'.$i->id)}}">
                                <button>Huy</button></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                           
                            <div class="col-12 body_f_ct_don">
                            @foreach($i->f_order as $item)
                                <div class="col-lg-4">
                                    <div class="ct_img_cart">
                                        <img src="{{URL::to(''.$item->image)}}" alt="" srcset="" style="width:100px;">
                                    </div>
                                    <div class="cont_cart">
                                    <div class="name_food_c">
                                  {{$item->name_menu}}
                                </div>
                                <div class="food_quanty">
                                  x {{$item->qty}}
                                </div>
                                <div class="type_food_c">
                                {{number_format($item->price)}} đ
                                </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          
                            <div class="col-12 footer_f_ct">
                                <div class="col-lg-6">
                                    <a href="#">
                                        <button>Quay lai Shop</button>
                                    </a>
                                </div>
                                <div class="col-lg-6" style="text-align: right;">
                                    <h4>{{number_format($i->totail)}} đ</h4>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    @endforeach
                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="body_cart_cancel">
                        <div class="title_cart_c">
                            <p>ĐÃ HỦY</p>
                        </div>
                   
                        <div class="title_cart_c">
                            <h4>Tổng tiền:</h4> 30000đ
                        </div>

                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    @foreach($ord_dis as $i)
                    <div class="body_cart_cancel">
                        <div class="row f_ct_don">
                            <div class="col-12 title_f_ct_don">
                                <div class="col-lg-4 f_code_don">
                                    <ul>
                                        <li>Mã đơn hàng:<b>{{$i->id}} </b> </li>
                                        <li>Ngày Giao:<b>{{$i->date}}</b> </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 f_code_don" >
                                    <ul>
                                        <li>Số điện thoại:<b>{{$i->phone}}</b></li>
                                        <li>Người nhận:<b>{{$i->name_cus}}</b></li>
                                    </ul>
                                </div>
                               
                            </div>
                           
                            <div class="col-12 body_f_ct_don">
                            @foreach($i->f_order as $item)
                                <div class="col-lg-4">
                                    <div class="ct_img_cart">
                                        <img src="{{URL::to(''.$item->image)}}" alt="" srcset="" style="width:100px;">
                                    </div>
                                    <div class="cont_cart">
                                    <div class="name_food_c">
                                 <b>{{$item->name_menu}}</b> 
                                </div>
                                <div class="food_quanty">
                                  x {{$item->qty}}
                                </div>
                                <div class="type_food_c">
                                {{number_format($item->price)}} đ
                                </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          
                            <div class="col-12 footer_f_ct">
                                <div class="col-lg-6">
                                   
                                </div>
                                <div class="col-lg-6" style="text-align: right;">
                                    <h4>{{number_format($i->totail)}} đ</h4>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('pages.footer')
        <!-- Bootstrap Core JavaScript -->
        @section('script')
        <script>
            $(function () {
                $('.orderby').change(function () {
                    $('#form_order').submit();
                })
            })
        </script>

        @endsection

        @include('pages.js')
</body>

</html>