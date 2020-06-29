@if(Session::has("Cart") != null)
<ul>

  @foreach(Session::get("Cart")->categorys as $item)
    <li>
        <div class="food_list">
            <div class="deatil_item1">
            <a href="#">
                <img src="{{URL::to(''.$item['categoryInfo']->image)}}" width="100px" alt="" srcset="">
            </a>
            </div>
            <div class="deatil_item">
                <div class="detail_title">
                    <p class="detail_name">{{$item['categoryInfo']->name_menu}}</p>
                   
                </div>
                <div class="detail_content">
                    <span>{{number_format($item['categoryInfo']->price)}}₫ x {{$item['quanty']}}</span>
                </div>
                <div style="float:right;" class="icon_dele">
                <i class="fa fa-trash" aria-hidden="true" data-id="{{$item['categoryInfo']->id}}"></i>
                </div> 
        </div>

    </li>
   
  @endforeach
</ul>

<div class="detail_pay">
    <span class="title_tcong">Tổng cộng</span>
    <span class="price">{{number_format(Session::get("Cart")->totailPrice)}}₫</span>
    <input hidden type="number" id="total_quanty_cart" value="{{Session::get('Cart')->TotailQuanty}}">
</div>
@endif
