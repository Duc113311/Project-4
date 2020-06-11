<title>Restaurnt SeaFood</title>
<!-- for-mobile-apps -->
<!-- alert -->
<!-- <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script> -->
<!-- end alert -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{asset('fontend\css\bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('fontend\css\style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="{{asset('fontend\css\font-awesome.css')}}" rel="stylesheet"> 
<!-- bootstrap -->
<script src="https://use.fontawesome.com/c04ae549dc.js"></script>
<!-- //font-awesome icons -->
<!-- js -->
<link rel="stylesheet" type="text/css" href="{{asset('fontend\css\index.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}" >

<script type="text/javascript" src="{{asset('fontend\js\jquery-1.11.1.min.js')}}"></script>
<!-- //js -->

<script type="text/javascript" src="{{asset('fontend\js\move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('fontend\js\easing.js')}}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
