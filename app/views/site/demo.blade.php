<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Demo</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" ">
		<link rel="stylesheet" type="text/css" href=" {{ asset('') }} ">
		{{ HTML::style('frontend/css/font-awesome.min.css')}}
		{{ HTML::style('frontend/css/democss.css')}}

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body >
		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-xs-12 text-left txt">
						<ol>
							<li><a href="#"><strong><</strong></a></li>
							<li><a href="/">Trang Chủ></a></li>
							<li><a href="#">Lớp 1></a></li>
							<li><a href="#">Môn toán</a></li>
						</ol>
					</div>
					<div class="col-md-6 col-xs-12 text-right logo">
					   <ul>
					   	<li><input type="text" name=""></li>
					   	<li><img src="{{ asset('frontend/images/avata.jpg') }}"></li>
					   </ul> 
					</div>
				</div>
			</div>
		</header>
		<!-- end header -->
		<div class="content">
			<div class="container" id="nav">
				<div class="row">
					<div class="col-md-12 col-xs-6 ">
						<div class="bn-header">
							<img src="{{ asset('/images/image_demo/title-content.png') }}">
						</div>
					</div>
				</div>
			</div>
			<!-- end content-top -->
			<div class="container" id="content">
				<div class="row">
					<div class="col-md-10" id="sidebar-left">
						<div class="top-left">
							<h2>HELLO TIDI~</h2>
							<p class="avata">
								<img src="{{ asset('/images/image_demo/icon-avata.png') }}">
							</p>	
							<p class="stars"><span>20</span><img src="{{ asset('/images/image_demo/content-right/stars-1.png') }}"></p>
						</div>
						<!-- end top-left -->
						<div class="top-right">
							<div>
								<h2>CON ĐANG HỌC BÀI 3</h2>
								<p><button>HỌC TIẾP</button></p>
							</div>
						</div>
					</div>
					<!-- end content-left -->
					<div class="col-md-2" id="sidebar-right">
						<p><img src="{{ asset('/images/image_demo/content-right/content-icon-1.png') }}"></p>
						<p><h3>BẢNG XẾP HẠNG HỌC SINH LỚP 1</h3></p>
					</div>
					<!-- end content -right -->
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6">
							
						</div>
						<div class="col-md-6">
							<div class="Middle-right text-right">
							</div>
						</div>
					</div>
					<div class="col-md-2">
						
					</div>
				</div>
			</div>
		</div>
		<!-- end content -->
		<div class="footer" style="background-color: red;height: 250px">
			
		</div>
		 <!-- end footer -->

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		
	</body>
</html>