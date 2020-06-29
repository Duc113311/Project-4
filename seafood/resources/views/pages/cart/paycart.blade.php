<!DOCTYPE html>
<html>

<head>
    @include('pages.header')
    <!-- start-smoth-scrolling -->
</head>

<body>
    <!-- header -->


    @include('pages.nvabar')
    <!-- main-slider -->
   

    <div class="products header-area1">
        <div class="container">
        <form action="{{route('dathang')}}" method="post">
                    @csrf
            <div class="agileinfo_single">    
                <header class="entry-header">
                    <h1>THANH TOÁN</h1>
                </header>
                <div class="infor_cart">
                    <div class="col-md-6">
                  
                        <div class="infor_kh">
                            <h2>Thông tin khách hàng</h2>
                            @if($errors->any())
                            <div class="btn btn-danger">
                            @foreach($errors->all() as $err)
                            <li>{{$err}}</li>
                            @endforeach
                            </div>
                            @endif
                            <p class="form-kh">
                                <label for="">Họ và tên *</label>
                                <input class="txt" type="text" name="name_cus" id="name_cus" placeholder="Nhập tên">
                            </p>
                            <p class="form-kh">
                                <label for="">Địa chỉ *</label>
                                <input class="txt" type="text" name="address" id="address" placeholder="Nhập địa chỉ">
                            </p>
                            <p class="form-kh1">
                                <label for="">Số điện thoại *</label>
                                <input class="txt" type="text" name="phone" id="phone" placeholder="Nhập số điện thoại">
                            </p>
                            <p class="form-kh1" style="float: right;">
                                <label for="">Email *</label>
                                <input class="txt" type="text" name="email" id="email" placeholder="Nhập email">
                            </p>
                            <p class="form-kh1">
                                <label for="">Ngày nhận*</label>
                                <input type="date" name="date" class="txt" id="date">
                            </p>
                            <p class="form-kh1" style="float: right;">
                                <label for="">Giờ ăn *</label>
                                <input type="time" class="txt" name="time" id="time">
                                                            </p>
                        </div>
                        <div class="infor_kh" style="margin-top: 11em;">
                            <h2>Thông Tin Bổ Sung</h2>
                            <p class="form-kh">
                                <label for="">Ghi chú đơn hàng (tùy chọn)</label>
                                <textarea name="note" id="note" cols="30" rows="10"
                                    placeholder="Ghi chú về đơn hàng,ví dụ: thời gian hay địa chỉ điểm giao chi tiết hơn."></textarea>
                            </p>

                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="infor_kh" style="border: 1px solid #e1e1e1;">
                            <h2>Đơn Hàng Của Bạn</h2>
                            <div class="ct_donhangs">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tổng</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(Session::has("Cart") != null)
                @foreach(Session::get("Cart")->categorys as $item)
                                        <tr>
                                            <td scope="row">
                                            {{$item['categoryInfo']->name_menu}}
                                                <strong class="product-quantity">× {{$item['quanty']}}</strong>
                                            </td>
                                            <td>
                                                <span>{{number_format($item['price'])}}₫
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                     
                                        
              
                <thead>
                                        <tr>
                                            
                                            <th>Tổng</th>
                                          
                                            <th>{{number_format(Session::get("Cart")->totailPrice)}}₫</th>
                                        </tr>
                                    </thead>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="infor_kh" style="border: 1px solid #e1e1e1;">
                            <h2>Đơn Hàng Của Bạn</h2>
                            <div class="ct_donhangs">
                                <div class="ct_cart">
                                    <label for="">Trả tiền mặt trước khi nhận đơn</label>
                                    <p>Trả tiền mặt khi giao hàng</p>
                                </div>
                                <div class="btn_tt">
                                <a href="{{route('trangthai')}}">
                                    <input type="submit" value="Đặt Hàng">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="clearfix"> </div>
            </div>
            </form>
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