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
                        <div class="title_cart_c">
                           <a href="{{URL::to('/gio-hang/trang_thai_don/'.$i->id)}}">
                           <button>Huy</button></a>
                        </div>
                        @foreach($i->order as $item)
                        <div class="ct_cart_c">
                            <div class="image_cart_c sp_cart_cancel">
                                <img src="fontend\images\{{$item->image}}" alt="" srcset="">
                            </div>
                            <div class="sp_cart_cancel">
                                <div class="name_food_c">
                                  {{$item->name_menu}} 
                                </div>
                                <div class="food_quanty">
                                    x {{$item->qty}}
                                </div>
                                <div class="type_food_c">
                                    {{$item->price}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="title_cart_c">
                            <h4>Tổng tiền:</h4> {{$i->totail}}
                        </div>
                       
                    </div>
                    @endforeach
                </div>
                
              
                <div id="menu1" class="tab-pane fade">
                <div class="body_cart_cancel">
                        <div class="title_cart_c">
                            <p>ĐÃ HỦY</p>
                        </div>
                        <!-- <div class="ct_cart_c">
                            <div class="image_cart_c sp_cart_cancel">
                                <img src="{{asset('fontend\images\Bề bề rang muối.jpg')}}" alt="" srcset="">
                            </div>
                            <div class="sp_cart_cancel">
                                <div class="name_food_c">
                                    Dau củ quả
                                </div>
                                <div class="type_food_c">
                                    Mon khai vi
                                </div>
                                <div class="food_quanty">
                                    x 1
                                </div>
                            </div>
                        </div> -->
                        <div class="title_cart_c">
                            <h4>Tổng tiền:</h4> 30000đ
                        </div>

                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                <div class="body_cart_cancel">
                        <div class="title_cart_c">
                            <p>ĐÃ HỦY</p>
                        </div>
                        <!-- <div class="ct_cart_c">
                            <div class="image_cart_c sp_cart_cancel">
                                <img src="{{asset('fontend\images\Bề bề rang muối.jpg')}}" alt="" srcset="">
                            </div>
                            <div class="sp_cart_cancel">
                                <div class="name_food_c">
                                    Dau củ quả
                                </div>
                                <div class="type_food_c">
                                    Mon khai vi
                                </div>
                                <div class="food_quanty">
                                    x 1
                                </div>
                            </div>
                        </div> -->
                        <div class="title_cart_c">
                            <h4>Tổng tiền:</h4> 30000đ
                        </div>

                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                @foreach($ord_dis as $i)
                <div class="body_cart_cancel">
                        
                        @foreach($i->order as $item)
                        <div class="ct_cart_c">
                            <div class="image_cart_c sp_cart_cancel">
                                <img src="fontend\images\{{$item->image}}" alt="" srcset="">
                            </div>
                            <div class="sp_cart_cancel">
                                <div class="name_food_c">
                                  {{$item->name_menu}} 
                                </div>
                                <div class="food_quanty">
                                    x {{$item->qty}}
                                </div>
                                <div class="type_food_c">
                                    {{$item->price}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="title_cart_c">
                            <h4>Tổng tiền:</h4> {{$i->totail}}
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