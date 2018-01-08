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
					   <ol>
					   	<li><input type="text" name=""></li>
					   	<li><img src="{{ asset('frontend/images/avata.jpg') }}"></li>
					   </0l> 
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

				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="col-md-6">
							<div class="chapter">
								<h2 class="title">
								  <span class='head'>Chương 1</span><span class="name">Các số đếm đến 10. Hình vuông, hình tròn, hình tam giác</span>
								</h2>
								<ul class="list">
									<li>
										<a href="#">Nhiều hơn ít hơn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Các số 1 2 3</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình vuông, hình tròn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình tam giác</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Nhiều hơn ít hơn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Các số 1 2 3</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình vuông, hình tròn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình tam giác</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
								</ul>
							</div>
							<div class="chapter">
								<h2 class="title">
								  <span class='head'>Chương 2</span><span class="name">Các số đếm đến 10. Hình vuông, hình tròn, hình tam giác</span>
								</h2>
								<ul class="list">
									<li>
										<a href="#">Nhiều hơn ít hơn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Các số 1 2 3</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình vuông, hình tròn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình tam giác</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Nhiều hơn ít hơn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Các số 1 2 3</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình vuông, hình tròn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình tam giác</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-6">
							<div class="chapter">
								<h2 class="title">
								  <span class='head'>Chương 3</span><span class="name">Các số đếm đến 10. Hình vuông, hình tròn, hình tam giác</span>
								</h2>
								<ul class="list">
									<li>
										<a href="#">Nhiều hơn ít hơn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Các số 1 2 3</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình vuông, hình tròn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình tam giác</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Nhiều hơn ít hơn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Các số 1 2 3</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình vuông, hình tròn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình tam giác</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
								</ul>
							</div>
							<div class="chapter">
								<h2 class="title">
								  <span class='head'>Chương 4</span><span class="name">Các số đếm đến 10. Hình vuông, hình tròn, hình tam giác</span>
								</h2>
								<ul class="list">
									<li>
										<a href="#">Nhiều hơn ít hơn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Các số 1 2 3</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình vuông, hình tròn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình tam giác</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Nhiều hơn ít hơn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Các số 1 2 3</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình vuông, hình tròn</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
									<li>
										<a href="#">Hình tam giác</a>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 col-xs-12" id="sidebar-right">
						<div class="level">
							<div class="box-top">
								<p class="avata-top"><img src="{{ asset('/images/image_demo/content-right/content-icon-1.png') }}"></p>
								<h2 class="title1">BẢNG XẾP HẠNG HỌC SINH LỚP 1</h2>
							</div>
							<div class="item">
								<span class="box1">1</span>
								<div class="student">
									<div class="avata-student">
										<img src="{{ asset('/images/image_demo/content-right/content-icon-2.png') }}">
									</div>
									<div class="info">
										<span class="rate">20 <i class="fa fa-star" aria-hidden="true" style="color: yellow"></i> <span class="grey-color" style="color: grey">85/100</span></span>
										<span class="name1">ANNA T.</span>
									</div>
								</div>
							</div>
							<div class="item">
								<span class="box1">2</span>
								<div class="student">
									<div class="avata-student">
										<img src="{{ asset('/images/image_demo/content-right/content-icon-3.png') }}">
									</div>
									<div class="info">
										<span class="rate">20 <i class="fa fa-star" aria-hidden="true" style="color: yellow"></i> <span class="grey-color" style="color: grey">85/100</span></span>
										<span class="name1">ANNA T.</span>
									</div>
								</div>
							</div>
							<div class="item">
								<span class="box1">3</span>
								<div class="student">
									<div class="avata-student">
										<img src="{{ asset('/images/image_demo/content-right/content-icon-4.png') }}">
									</div>
									<div class="info">
										<span class="rate">20 <i class="fa fa-star" aria-hidden="true" style="color: yellow"></i> <span class="grey-color" style="color: grey">85/100</span></span>
										<span class="name1">ANNA T.</span>
									</div>
								</div>
							</div>
							<div class="item">
								<span class="box1">4</span>
								<div class="student">
									<div class="avata-student">
										<img src="{{ asset('/images/image_demo/content-right/content-icon-5.png') }}">
									</div>
									<div class="info">
										<span class="rate">20 <i class="fa fa-star" aria-hidden="true" style="color: yellow"></i> <span class="grey-color" style="color: grey">85/100</span></span>
										<span class="name1">ANNA T.</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
					<!-- end content -right -->
			</div>
		</div>
		<!-- end content -->
		 <footer class="footer">
        <div class="container">
            <div class="des">
                Cơ quan chủ quản: Công ty Cổ phần Đầu tư và Dịch vụ Giáo dục <br/>
                Địa chỉ: Tầng 4, Tòa nhà 25T2, Đường Nguyễn Thị Thập, Phường Trung Hoà, Quận Cầu Giấy, Hà Nội.<br/>
                Tel: +84 (4) 3519-0591 Fax: +84 (4) 3519-0587<br/>
                Giấy phép cung cấp dịch vụ mạng xã hội trực tuyến số 597/GP-BTTTT Bộ Thông tin và Truyền thông cấp ngày 30/12/2016.<br/>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="content pull-left">&copy; 2017 phát triển và xây dựng bởi HOCMAI</div>
                <div class="social pull-right">
                    <a href="" title="" class="inline-block"><img src="{{ asset('/images/image_demo/icon_facebook.jpg') }}" class="img-responsive" alt=""/></a>
                    <a href="" title="" class="inline-block"><img src="{{ asset('/images/image_demo/google.jpg') }}" class="img-responsive" alt=""/></a>
                </div>
            </div>

        </div>
    </footer>
		 <!-- end footer -->

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		
	</body>
</html>