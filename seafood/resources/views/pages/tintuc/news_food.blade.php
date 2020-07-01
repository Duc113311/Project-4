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
				<li class="active">Tin Tức</li>
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
		<div class="container tintuc_n">
            <div class="row">
				@foreach($news_food as $item)
             <div class="col-12 col-md-6 col-xl-4">
                <div class="item_new">
                    <article class="ac_inner">
                        <a href="#" class="ac_img">
                            <img src="{{asset(''.$item->image_news)}}" alt="" srcset="">
                        </a>
                        <div class="ar_content">
                            <h5>
                                <a href="#" >
                               {{$item->title_news}}
                                </a>
                            </h5>
                            <h6>
							{{date('d/m/y H:i',strtotime($item->created_at))}}
                            </h6>
                            <p>
							{{$item->content_news}}
							
                            </p>
                        </div>
                    </article>
                </div>
			  </div>
			  @endforeach
              
            
            
            </div>
           
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //new -->

	@include('pages.footer')
	<!-- Bootstrap Core JavaScript -->

	@include('pages.js')
	
</body>

</html>