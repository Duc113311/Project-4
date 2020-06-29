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



	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a>
				</li>
				<li class="active">Thực đơn</li>
			</ol>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!--- products --->
	<div class="products header-area1">
		<div class="row about_bg">
			<div>
				<img src="img_sp\about_left.png" alt="">
			</div>
			<div>
				<img src="img_sp\about_right.png" alt="">
			</div>
		</div>
		<div class="container">
			<div class="col-md-3 products-left">
				<div class="categories">
					<h2>Danh Mục</h2>
					<ul class="cate">
						@foreach($category as $key=>$cat)
						<li><a href="{{URL::to('/chitietmuc/'.$cat->id)}}"><i class="fa fa-arrow-right"
									aria-hidden="true"></i>{{$cat->name_menu}}</a></li>

						@endforeach
					</ul>
				</div>
				<div class="categories" style="margin-top: 50px;">
					<h2><i class="fa fa-sort"></i>sLỌC ĐIỀU KIỆN</h2>
					<ul class="cate">

						<li>
							<a href="?price=1"><i class="fa fa-arrow-right" aria-hidden="true"></i> Dưới 500.000đ</a>
						</li>
						<li>
							<a href="?price=2"><i class="fa fa-arrow-right" aria-hidden="true"></i>
								500.000-1.000.000đ</a>
						</li>
						<li>
							<a href="?price=3"><i class="fa fa-arrow-right"
									aria-hidden="true"></i>1.000.000-5.000.000đ</a>
						</li>


					</ul>
				</div>
			</div>
			<div class="col-md-9 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids">
						<form action="" id="form_order" method="get">
							<div class="sorting">
								<select id="country" onchange="orderby1(this)" name="orderby" >
									<option value="md"></i>Mặc định phân
										loại</option>
									<option value="desc"></i>Mới nhất
									</option>
									<option value="ace"></i>Món cũ
									</option>
									<option value="price_max"></i>Giá
										tăng dần</option>
									<option value="price_min"></i>Giá
										dảm dần</option>
								</select>
							</div>
						</form>
						<div class="sorting-left">
							<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Mục trên trang
									9</option>
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Mục trên trang
									18</option>
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Mục trên trang
									32</option>
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Tất cả</option>
							</select>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="agile_top_brands_grids">
					@foreach($ct_cate_food as $key=>$ite)
					<div class="col-md-4 top_brand_left">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos">
									<img src="img_sp\offer.jpg" alt=" " class="img-responsive">
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="single.html"><img title=" " alt=" "
														src="{{URL::to(''.$ite->image)}}"></a>
												<a href="{{URL::to('/chitietfood/'.$ite->id)}}">
													<p>{{$ite->name_menu}}</p>
												</a>

												<p><b>{{number_format($ite->price)}}<sup>₫</sup></b></P>
											</div>
											<div class="snipcart-details top_brand_home_details">

												<fieldset>
													<a onclick="AddCartShop({{$ite->id}})" href="javascript:">
														<input type="submit" name="submit" value="Thêm vào giỏ"
															class="button">
													</a>
												</fieldset>

											</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>


					@endforeach


					<div class="clearfix"> </div>
				</div>



				<nav class="numbering">
					<ul class="paging">
						<li>
							{!!$ct_cate_food->links()!!}
						</li>
					</ul>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //new -->
	@section('script')
	<script type="text/javascript">
		// $(function () {
		// 	$('.orderby').change(function () {
		// 		$('#form_order').submit();
		// 	})
		// })
		
	</script>

	@stop
	@include('pages.footer')
	<!-- Bootstrap Core JavaScript -->

	@include('pages.js')
	
</body>

</html>