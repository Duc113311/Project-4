<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
	@include('pages.slide')
	
		
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
    @yield('content')
<!-- //new -->
    @include('pages.footer')
<!-- Bootstrap Core JavaScript -->
   @include('pages.js')
<!-- //main slider-banner --> 
</body>
</html>