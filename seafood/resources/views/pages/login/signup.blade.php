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



<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Đăng Nhập</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
            <h2>Đăng Nhập</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="" method="post">
                   
					<input type="email" placeholder="Email Address" required=" " id="email" name="email">
					<input type="password" placeholder="Password" required=" " id="password" name="password">
					<div class="forgot">
						<a href="#">Quên mật khẩu</a>
					</div>
					<input type="submit" value="Đăng nhập">
				</form>
			</div>
			<h4>Nhà hàng SeaFood</h4>
			<p><a href="registered.html">Tạo tài khoản</a> quay lại  <a href="index.html">Trang chủ<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
    </div>
    
    	<!-- //new -->
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