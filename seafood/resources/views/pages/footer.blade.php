<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-4 w3_footer_grid">
					<h3>NHÀ HÀNG SEAFOOD</h3>
					
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Quận Thủ Đức, Hai Bà Trưng</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">nhahangseafood.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>0962.282.864</li>
					</ul>
				</div>
				<div class="col-md-4 w3_footer_grid">
					<h3>CHÍNH SÁCH HỖ TRỢ</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">Hướng dẫn mua hàng</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.html">Chính sách đổi trả</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="short-codes.html">Chăm sóc khách hàng</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="faq.html">Giải quyết khuyến mại</a></li>
						
					</ul>
				</div>
				
				<div class="col-md-4 w3_footer_grid">
					<h3>FANPAGE FACEBOOK</h3>
					<img src="{{asset('fontend/images/face.PNG')}}" alt="" srcset="">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="footer-copy">
			
			<div class="container">
				<p>© 2020 Nhà hàng SEAFOOD | Thiết kế bởi SV_FIT-UTEHY</a></p>
			</div>
		</div>
		
	</div>	
	<div class="footer-botm">
			<div class="container">
				<div class="w3layouts-foot">
					<ul>
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="payment-w3ls">	
					<img src="fontend\images\card.png" alt=" " class="img-responsive">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //footer -->	
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
<!-- //main slider-banner -->
<script>
	function AddCartShop(id) {
		$.ajax({
			url: '/Add-Cart/' + id,
			type: 'GET',
		}).done(function (reponse) {
			RenderCart(reponse);
			alertify.message('Thêm thành công ');
		});
	}

	$("#chane_item_cart").on("click", ".icon_dele i", function () {
		$.ajax({
			url: '/DeleteCart/' + $(this).data("id"),
			type: 'GET',
		}).done(function (reponse) {
			RenderCart(reponse);
			alertify.message('Xóa thành công ');

		});
	});

	function RenderCart(reponse)
	{
		$("#chane_item_cart").empty();
		$("#chane_item_cart").html(reponse);
		$("#total_quanty_number").text($("#total_quanty_cart").val());
	}


</script>
