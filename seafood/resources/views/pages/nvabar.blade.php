@section('css')
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />


<link rel="stylesheet" href="{{url('sweetalert/package/dist/sweetalert2.min.css')}}" />

@endsection
<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p><i class="fa fa-envelope"></i> Email: <a href="products.html">ducthieugia189@gmail.com</a></p>
			</div>
			<div class="agile-login">
				<ul>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"> <i class="fa fa-youtube" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					
					@if(Auth::check())
					<li><a href="{{route('logout')}}"  >Đăng xuất</a></li>
					<li>Chào,{{Auth::user()->name}}</li>
					
					@else
					<li><a href="#" data-toggle="modal" data-target="#reginter" >Đăng ký</a></li>
					<li><a href="#" data-toggle="modal" data-target="#loginuser" >Đăng nhập</a></li>
					@endif
					<li><a href="{{route('trangthai')}}" >Đơn Hàng</a></li>
					<li>
						<a href="#" class="shop_cart" type="submit" name="submit" value="">
							<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
							@if(Session::has("Cart") !=null)
							<span class="cart-badge" id="total_quanty_number">{{Session::get('Cart')->TotailQuanty}}</span>
							@else
							<span class="cart-badge" id="total_quanty_number">0</span>
							@endif
							
						</a>

						<div class="top_cart">
							<div id="chane_item_cart">
								@if(Session::has("Cart") != null)
								<ul>

									@foreach(Session::get("Cart")->categorys as $item)
									<li>
										<div class="food_list">
											<div class="deatil_item1">
												<a href="#">
													<img src="{{URL::to(''.$item['categoryInfo']->image)}}"
														width="100px" alt="" srcset="">
												</a>
											</div>
											<div class="deatil_item">
												<div class="detail_title">
													<p class="detail_name">{{$item['categoryInfo']->name_menu}}</p>

												</div>
												<div class="detail_content">
													<span>{{number_format($item['categoryInfo']->price)}}₫ x
														{{$item['quanty']}}</span>
												</div>
												<div style="float:right;" class="icon_dele">
													<i class="fa fa-trash" aria-hidden="true"
														data-id="{{$item['categoryInfo']->id}}"></i>
												</div>
											</div>

									</li>

									@endforeach
								</ul>

								<div class="detail_pay">
									<span class="title_tcong">Tổng cộng</span>
									<span class="price">{{number_format(Session::get("Cart")->totailPrice)}}₫</span>
								</div>
								@else
									<h5 style="padding: 10px;text-align: center;font-size: 16px;" id="xoacarrt">Không có sản phẩm</h5>
								
								@endif

							</div>
							<div class="bt-thanhtoan">
								<a href="{{URL::to('/list_cart_food')}}">
								<input class="btn btn-primary" type="submit" value="Xem giỏ hàng"></a>
								<input class="btn btn-white paypice" type="submit" value="Thanh toán">
							</div>

						</div>
					</li>

				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

<div class="logo_products">
	<div class="container">
		<div class="w3ls_logo_products_left1">
			<ul class="phone_email">
				<li><i class="fa fa-phone" aria-hidden="true"></i>Miễn phí liên hệ 24/7: 0962.282.864</li>

			</ul>
		</div>
		<div class="w3ls_logo_products_left">
			<h1><a href="index.html">
					<img src="{{asset('fontend\images\logo1.jpg')}}" alt="" srcset="" style="width: 242px;height: 116px;">
				</a></h1>
		</div>
		<div class="w3l_search">
			<form action="{{URL::to('/search')}}" method="get">
				<input type="search" name="result" placeholder="Nhập thông tin món ăn...." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //header -->

<!-- navigation -->
<div class="navigation-agileits">
	<div class="container">
		<nav class="navbar navbar-default">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header nav_2">
				<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
					data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
				<ul class="nav navbar-nav">
					<li class="active"><a href="{{route('trangchu')}}" class="act">TRANG CHỦ</a></li>
					<!-- Mega Menu -->
					<li class="dropdown">
						<a href="{{route('trangchu')}}" class="dropdown-toggle">GIỚI THIỆU</a>
					</li>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">THỰC ĐƠN<b class="caret"></b></a>
						<ul class="dropdown-menu multi-column columns-3">
							<div class="row">
								<div class="multi-gd-img">
									<ul class="multi-column-dropdown">
										@foreach($category as $key=>$ctm)
										<li><a href="{{URL::to('/chitietmuc/'.$ctm->id)}}">{{$ctm->name_menu}}</a></li>
										@endforeach
									</ul>
								</div>
							</div>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="{{route('show_new')}}">TIN TỨC</a>
					</li>
					<li><a href="gourmet.html">LIÊN HỆ</a></li>
					<li><a href="offers.html">ĐẶT BÀN</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>

<!-- //navigation -->
<!-- Button trigger modal -->




<!-- Modal -->



<!-- Modal -->
<div class="modal fade" id="reginter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 61%;">
      <div class="modal-body">
	 <div style="text-align: center; padding: 4px;"> 
		 <h4>Đăng ký thông tin</h4>
	 </div>
			<div class="login-form-grids">
					<form action="" method="post" id="register_">
					{{ csrf_field() }}
                    <input type="text" placeholder="Nhập tên....." name="name" id="name" required=" " style="margin-bottom: 15px;">
                  
					<input type="email" placeholder="Nhập email...." required=" " name="email" id="email">
                   
					<input type="password" placeholder="Nhập mật khẩu..." required=" " name="password" id="password">
                   
					<input type="password" placeholder="Nhập lại mật khẩu..." required=" " name="re_password" id="re_password">
                   
					<div class="register-check-box">
						<div class="check">
							<label style="color: #4A2625 !important;" class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Tôi châp nhận các điều khoản và điều kiện</label>
						</div>
					</div>
					<button style="width: 100%;margin-top: 16px;" type="submit" class="btn btn-primary" id="btndangky">Đăng ký</button>
				</form>
			</div>
      </div>
    </div>
  </div>
</div>



<!-- login -->
<div class="modal fade" id="loginuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 61%;">
      <div class="modal-body">
	  <div style="text-align: center; padding: 4px;"> 
		 <h4>Đăng nhập thông tin</h4>
	 </div>
			<div class="login-form-grids">
			
					<form action="" method="post">
					{{ csrf_field() }}
					<input type="email" placeholder="Email Address" required=" " name="email" id="iemail">
                   
					<input type="password" placeholder="Password" required=" " name="password" id="ipassword">
                   
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Tôi châp nhận các điều khoản và điều kiện</label>
						</div>
					</div>
					
					<button style="width: 100%;margin-top: 16px;" type="submit" class="btn btn-primary" id="btnDangnhap">Đăng nhập</button>
				</form>
			</div>
      </div>
    </div>
  </div>
</div>
@section('js')
<script src="{{url('editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('editor/ckfinder/ckfinder.js')}}"></script>
<script src="{{url('sweetalert/package/dist/sweetalert2.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

@endsection