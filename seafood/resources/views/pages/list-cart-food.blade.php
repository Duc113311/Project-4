<div class="rowtd">
  
    <a href="#" class="button">
        Tiếp tục mua sản phẩm
    </a>

    {{Session::get("Cart")->TotailQuanty}} "món mới" đã được thêm vào
  
</div>

<div class="row">
    <div class="col-lg-8">
        <table class="shop_table table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tổng</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::has("Cart") != null)
                @foreach(Session::get("Cart")->categorys as $item)
                <tr>

                    <td scope="row">
                        <a href="#" class="xoacart" onclick="DeleteItemcart({{$item['categoryInfo']->id}});">×</a>

                    </td>
                    <td>
                        <a href="#" onclick="SaveItemCart({{$item['categoryInfo']->id}});">
                            <i class="fa fa-refresh"></i>
                        </a>
                    </td>
                    <td>
                        <img width="50px;" src="{{URL::to('/fontend/images/'.$item['categoryInfo']->image)}}" alt=""
                            srcset="">

                    </td>
                    <td>{{$item['categoryInfo']->name_menu}} </td>
                    <td>{{number_format($item['categoryInfo']->price)}}₫</td>
                    <td>
                        <input style="width: 50px;" type="number" value="{{$item['quanty']}}"
                            id="quanty-item-{{$item['categoryInfo']->id}}">

                    </td>
                    <td>{{number_format($item['price'])}}₫ </td>
                </tr>

                @endforeach
                @endif

            </tbody>
        </table>
        <tr>
            <td colspan="6" class="actions">
                <input type="submit" value="Cập nhật giỏ hàng" name="" class="button">
                <input type="hidden" id="" name="" value="">
                <input type="hidden" name="" value="">
            </td>
        </tr>
    </div>
    <div class="col-lg-4">
        <div class="tongtien">
            <h2 style="font-size: 24px;">Cộng giỏ hàng</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <th>Tổng số lượng</th>
                        <td>
                            <span>{{Session::get("Cart")->TotailQuanty}}
                            </span>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Tổng tiền</th>
                        <td>
                            <span>{{number_format(Session::get("Cart")->totailPrice)}}₫
                            </span>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="cart_checkout">
                <a href="{{URL::to('/gio-hang/thanh_toan')}}" class="check_button">
                    TIẾN HÀNH THANH TOÁN
                </a>
            </div>

        </div>
    </div>
</div>