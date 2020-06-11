
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
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
				<li class="active">Thực đơn</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--- products --->
<div class="products header-area1">
		
		<div class="container">
			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="{{URL::to('/fontend/images/' .$detail_cate_food->image)}}" alt=" " class="img-responsive">
				</div>
				<div class="col-md-8 agileinfo_single_right">
			
					{{csrf_field()}}
				<h2>{{$detail_cate_food->name_menu}}</h2>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="w3agile_description">
						<h4>Mô tả</h4>
						<p>{{$detail_cate_food->desc_food}}</p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart cart_gh">
							<input type="number" name="" id="" value="1" style="width: 60px;width: 60px;height: 34px;padding-left: 5px;">
						
						</div>
						<div class="snipcart-details agileinfo_single_right_details cart_gh">
																		<a onclick="AddCartShop({{$detail_cate_food->id}})" href="javascript:">
														<input type="submit" name="submit" value="Thêm vào giỏ"
															class="button">
													</a>
															

						</div>
					</div>
				
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
            </div>
			<!-- new -->
			<div class="newproducts-w3agile">
			<div class="container">
			<h3>MÓN LIÊN QUAN</h3>
				<div class="agile_top_brands_grids">
                  @foreach($relate as $key=>$lienquan)
				  <div class="col-md-4 top_brand_left">
											<div class="hover14 column">
												<div class="agile_top_brand_left_grid">
													<div class="agile_top_brand_left_grid_pos">
														<img src="fontend\images\offer.jpg" alt=" "
															class="img-responsive" />
													</div>
													<div class="agile_top_brand_left_grid1">
														<figure>
															<div class="snipcart-item block">
																<div class="snipcart-thumb">
																	<a href="products.html"><img title=" " alt=" "
																			src="{{URL::to('/fontend/images/'.$lienquan->image)}}" /></a>
																	<a href="{{URL::to('/chitietfood/'.$lienquan->id)}}">
																		<p>{{$lienquan->name_menu}}</p>
																	</a>
																	<div class="stars">
																		<i class="fa fa-star blue-star"
																			aria-hidden="true"></i>
																		<i class="fa fa-star blue-star"
																			aria-hidden="true"></i>
																		<i class="fa fa-star blue-star"
																			aria-hidden="true"></i>
																		<i class="fa fa-star blue-star"
																			aria-hidden="true"></i>
																		<i class="fa fa-star gray-star"
																			aria-hidden="true"></i>
																	</div>
																	<h4>{{$lienquan->price}}<sup>₫</sup> </h4>
																</div>
																<div class="snipcart-details top_brand_home_details">

																	<fieldset>
																		<a onclick="AddCartShop({{$lienquan->id}})"
																			href="javascript:">
																			<input type="submit" name="submit"
																				value="Thêm vào giỏ" class="button">
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
			</div>
			</div>
			
		</div>
	</div>
<!-- //new -->
    @include('pages.footer')
<!-- Bootstrap Core JavaScript -->
   @include('pages.js')
<!-- //main slider-banner --> 
</body>
</html>