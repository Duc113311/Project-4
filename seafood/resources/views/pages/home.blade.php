@extends('welcome')
@section('content')

<div class="top-brands header-area">
	<div class="row about_bg">
		<div>
			<img src="fontend\images/about_left.png" alt="">
		</div>
		<div>
			<img src="fontend\images/about_right.png" alt="">
		</div>
	</div>
	<div class="container" style="margin-top: -47px;">
		<div class="row">
			<div class="col-12 col-xl-6">
				<div class="about_left">
					<h6>Đôi nét về</h6>
					<h5>NHÀ HÀNG SEAFOOD</h5>
					<P>NHÀ HÀNG HOÀNG CHÂU chuyên phục vụ các món ăn hải sản độc đáo với cách chế biến mới lạ.
						Đến với NHÀ HÀNG HOÀNG CHÂU quý khách sẽ vô cùng ngạc nhiên bởi sự phong phú của các
						món ăn được chế biến từ những nguyên liệu tươi ngon nhất. Thực khách sẽ được tự tay chọn
						các loại hải sản tươi sống như: Tôm hùm, hào, cua, mực, cá mú, cá đuối… Quý khách sẽ được
						thưởng thức những món ăn tuyệt vời trong không gian sang trọng, ấm cúng. Nhà hàng chúng tôi
						với đội ngũ nhân viên phục vụ chuyên nghiệp, tận tâm để đảm bảo quý thực khách có trải nghiệm
						ẩm thực khó quên với hương vị biển. Không sử dụng các nguyên liệu tái sinh hay phẩm màu để đảm
						bảo mang đến cho quý thực khách những món ăn ngon an toàn sức khỏe. Đầu Bếp của NHÀ HÀNG HOÀNG
						CHÂU đều là những Đầu Bếp chuyên nghiệp nhiều năm kinh nghiệm . Đặc biệt,
						NHÀ HÀNG HOÀNG CHÂU có thể đáp ứng được số lượng chỗ ngồi để đón tiếp các đoàn khách lớn.</P>
				</div>
			</div>
			<div class="col-12 col-xl-6">
				<div class="about_right h-100 d-flex align-item-center">
					<img src="fontend\/images/anhgioithieu.png" alt="" srcset="">

				</div>

			</div>
		</div>

	</div>
</div>




<div class="top-brand1 menu_today">
	<div class="menu_today__inner">
		<ul class="bg_item">
			<li>
				<img src="fontend\images\bg1.png" alt="" srcset="">
			</li>
			<li>
				<img src="fontend\images\bg2.png" alt="" srcset="">
			</li>
			<li>
				<img src="fontend\images\bg3.png" alt="" srcset="">
			</li>
			<li>
				<img src="fontend\images\bg4.png" alt="" srcset="">
			</li>
		</ul>
		<div class="container">
			<h2 style="text-align: center;">HÔM NAY ĂN GÌ?</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab"
								data-toggle="tab" aria-controls="expeditions" aria-expanded="true">CÁC MÓN MỚI</a></li>
						<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab"
								aria-controls="tours" ">MÓN ĂN HÔM NAY</a></li>
							</ul>
							<div id=" myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="expeditions"
									aria-labelledby="expeditions-tab">
									<div class="agile-tp">
										<h5>Hải sản tươi sống</h5>
										<p class="w3l-ad">Nhà hàng SEAFOOD đem lại những hương vị biển cả cho mọi người.
										</p>
									</div>
									<div class="agile_top_brands_grids">
										@foreach($all_food as $key=>$ct)
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
																			src="{{URL::to('/fontend/images/'.$ct->image)}}" /></a>
																	<a href="{{URL::to('/chitietfood/'.$ct->id)}}">
																		<p>{{$ct->name_menu}}</p>
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
																	<h4>{{$ct->price}}<sup>₫</sup> </h4>
																</div>
																<div class="snipcart-details top_brand_home_details">

																	<fieldset>
																		<a onclick="AddCartShop({{$ct->id}})"
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
								<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
									<div class="agile-tp">
										<h5>An toàn thực phẩm</h5>
										<p class="w3l-ad">Nhà hàng luôn luôn đặt tiêu chí an toàn lên hàng đầu.</p>
									</div>
									<div class="agile_top_brands_grids">
									@foreach($food_hot as $key=>$ct)
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
																			src="{{URL::to('/fontend/images/'.$ct->image)}}" /></a>
																	<a href="{{URL::to('/chitietfood/'.$ct->id)}}">
																		<p>{{$ct->name_menu}}</p>
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
																	<h4>{{$ct->price}}<sup>₫</sup> </h4>
																</div>
																<div class="snipcart-details top_brand_home_details">

																	<fieldset>
																		<a onclick="AddCartShop({{$ct->id}})"
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
	</div>

</div>

</div>
<!-- //top-brands -->
<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<a href="beverages.html"> <img class="first-slide" src="fontend\images\bannen11600.jpg"
					alt="First slide"></a>

		</div>
		<div class="item">
			<a href="personalcare.html"> <img class="second-slide " src="fontend\images\banner1600.jpg"
					alt="Second slide"></a>

		</div>
		<div class="item">
			<a href="household.html"><img class="third-slide " src="fontend\images\banner3 1600.jpg"
					alt="Third slide"></a>

		</div>
	</div>

</div><!-- /.carousel -->
<!--banner-bottom-->
<div class="ban-bottom-w3l">
	<div class="container">
		<div class="col-md-6 ban-bottom3">
			<div class="ban-top">
				<img src="fontend\images\nhahang4.jpg" class="img-responsive" alt="" />

			</div>
			<div class="ban-img">
				<div class=" ban-bottom1">
					<div class="ban-top">
						<img src="fontend\images\Cua Hấp.jpg" class="img-responsive" alt="" />

					</div>
				</div>
				<div class="ban-bottom2">
					<div class="ban-top">
						<img src="fontend\images\Mực xào sa tế.jpg" class="img-responsive" alt="" />

					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-6 ban-bottom">
			<div class="ban-top">
				<img src="{{asset('fontend\images\tomhumhap.jpg')}}" class="img-responsive" alt="" />
			</div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>
<!--banner-bottom-->
<!--brands-->
<div class="order__area">
	<div class="container">
		<div class="section__title text-center mb4">
			<h6>BÀN ĐẶT TIỆC</h6>
			<P>Vui lòng điền đầy đủ thông tin dưới để đặt bàn ngay</P>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="order-form" style="padding: 0px 23px;">
				<form action="{{route('dat_book')}}" method="post">
				@csrf
					<div class="bk-datban">

						<img class="wp-image-1055" src="fontend\images\title-form-datban.png" alt="" srcset="">
						<div class="ds"
							style="width: 100%;padding: 16px 53px;margin: 0 auto;margin-top: 11em;padding-right: 33px;">
							<ul>
								<li>
									<input type="text" name="name_customer" id="" placeholder="Họ tên">
								</li>
								<li>
									<input type="email" name="email" id="" placeholder="Email">
								</li>
								<li>
									<input type="tel" name="phone_number" id="" placeholder="Số điện thoại">
								</li>
								<li>
									<input type="date" name="order_date" id="" placeholder="Ngày ăn">
								</li>
								<li>
									<input type="time" name="Time_eat" id="" placeholder="Giờ ăn">
								</li>
								<li>
									<input type="text" name="min_price" id="" placeholder="Mức giá ăn">
								</li>
								<li>
									<select name="Number_customer" id="" class="n_cus">
										<option value="">Số khách</option>
										<option value="1 đến 5 người">1 đến 5 người</option>
										<option value="5 đến 10 người">5 đến 10 người</option>
										<option value="10 đến 20 người">10 đến 20 người</option>
										<option value="trên 20 người">trên 20 người</option>
									</select>
								</li>
								<li>
									<button type="button" class="list_ban" data-toggle="modal"
										data-target="#listbandat">
										Danh sách bàn
									</button>
									<input disabled type="text" name="banText" id="banText"readonly>
									<input type="hidden" name="ban" id="ban" readonly>
									
								</li>
								<li style="float: left;width: 100%;margin-bottom: 10px;">
									<textarea class="ghichu" name="Note" id="" placeholder="Ghi chú"></textarea>
								</li>
								<li style="width: 100%;text-align: center;">
									<button type="submit" class="book_table">Đặt bàn</button>
									
								</li>
							</ul>
						</div>
					</div>
					</form>
				</div>

			</div>
		</div>
	</div>

</div>
<!--//brands-->

<!-- new -->
<div class="newproducts-w3agile">
	<div class="container">
		<h3>TIM NỔI BẬT</h3>
		<div class="agile_top_brands_grids">
			<div class="col-md-4">
				<div class="img-news">
					<img src="fontend\/images\giadinh news.jpg" alt="">
				</div>
				<div class="content">
					<div class="content-title">
						<h6>7 lợi ích "đáng nể" của hải sản</h6>
					</div>
					<div class="content-bg">
						<p>Hải sản thực sự tốt cho sức khỏe, vì chứa nhiều vitamin
							và khoáng chất tự nhiên...Dưới đây là những lợi ích "đáng nể"
							của hải sản......
						</p>
					</div>
				</div>

			</div>
			<div class="col-md-4">
				<div class="img-news">
					<img src="fontend\/images\tre an haisan neww.jpg" alt="">
				</div>
				<div class="content">
					<div class="content-title">
						<h6>Mách cho bạn cách cho trẻ ăn hải sản không bị dị ứng</h6>
					</div>
					<div class="content-bg">
						<p>Hải sản là một loại thực phẩm được yêu thích
							chưa nhiều chất dinh dưỡng tốt cho sức khỏe và
							sự phát triển của trẻ.....
						</p>
					</div>
				</div>

			</div>
			<div class="col-md-4">
				<div class="img-news">
					<img src="fontend\/images\trungca new.jpg" alt="">
				</div>
				<div class="content">
					<div class="content-title">
						<h6>Những giá trị dinh dưỡng của trứng cá mà bạn chưa biết</h6>
					</div>
					<div class="content-bg">
						<p>Không phải ai cũng biết bụng cá chứa một số thành phần dinh dưỡng
							còn cao hơn cả thịt cá. Trong bụng cá có chứa bộ phận
							sinh sản là trứng cá
							giàu vitamin A, D, B, canxi…
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="listbandat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="width: 94%;left: 2em !important;">
			<div class="modal-header">
				<div class="col-lg-6">
				<h4 class="modal-title" id="exampleModalLabel">Danh sách bàn</h4>
				</div>
				<div class="col-lg-6" style="text-align: right;">
				<input type="date" name="date_b" id="" style="background: aquamarine;border: 1px solid #d6c5e2;padding: 3px 4px;">
				<input type="submit" value="Tìm Bàn" id="tim" class="btn btn-success">
				</div>
				
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#home">Sáng</a></li>
					<li><a data-toggle="tab" href="#menu1">Trưa</a></li>
					<li><a data-toggle="tab" href="#menu2">Tối</a></li>
				</ul>

				<div class="tab-content list_room">
					<div id="home" class="tab-pane fade in active l_room">
						<h4>Phòng VIP</h4>
						<ul id="tbs-list">
						
						</ul>
						
					</div>
					<div id="menu1" class="tab-pane fade l_room">
						<h4>Phòng VIP</h4>
						<ul id="tbc-list">
							
						</ul>
						<h4>Bàn</h4>
						<ul>
							
						</ul>
					</div>
					<div id="menu2" class="tab-pane fade l_room">
						<h4>Phòng VIP</h4>
						<ul id="tbt-list">
							
						</ul>
						<h4>Bàn</h4>
						<ul>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<script>
	jQuery('body').on('click', '.btn-chon', function () {

			var banText = $(this).context.innerText;
			var ban = $(this).val();
			console.log(ban)
			jQuery('#ban').val(ban);
			jQuery('#banText').val(banText);
			jQuery('#listbandat').modal('hide');
        });
	// function myFunction() {
	// 	var ban = $(this).val();
	// 	jQuery('#ban').val(ban);
	// 	jQuery('#listbandat').modal('hide');
	// };
	$("#tim").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                date_b: jQuery('#date_b').val(),
            };
            var type = "POST";
            var ajaxurl = '{{ url("/table") }}';
            
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (data) {
					console.log(data);
					var date_b= jQuery('#date_b').val();
					// forEach(data, function(tb){
					// 	var link = "<li><a href='#'>"+tb.name_table+"</a></li>";
					// jQuery('#tb-list').append(link);
					// });
					$.each(data, function(i, value){
						var link = "<li><button class='btn-chon form-control' id='chon'  value='"+value.id+"'>"+value.name_table+"</button></li>";
						if((value.order_date!=date_b) | (value.order_date==null))
						{
							jQuery('#tbs-list').append(link);
							jQuery('#tbt-list').append(link);
							jQuery('#tbc-list').append(link);
						}
						if((value.status==0)& (value.order_date==date_b) )
						{
							jQuery('#tbs-list').append(link);
						}
						if((value.status==1)& (value.order_date==date_b) )
						{
							jQuery('#tbc-list').append(link);
						}
			
					});
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
		
</script>
@endsection