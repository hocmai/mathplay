<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trang Chủ</title>

		<!-- Bootstrap CSS -->
		
		{{ HTML::style(asset('frontend/css/bootstrap.min.css')) }}
		{{HTML::style(asset('frontend/css/font-awesome.min.css'))}}
		{{ HTML::style(asset('frontend/css/splashmath.css')) }}
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		{{HTML::script(asset('frontend/css/jquery.min.js')) }}
		{{ HTML::script(asset('frontend/js/bootstrap.min.js'))}}
	</head>
	<body>
<div class="content">
	<div class="home-section white-bg nav">
		<div class="container">
			<h2 class="text_name">Get Personalized Learning Path Fit for Catching up, 
	    		<br>Enrichment or Regular Practice</h2>
			<div class="content_top">
				<img src="images/img_splashmath/personalized_report.png">
			</div>
		</div>
	</div>{{--  end.nav --}}
	<div class="home-section grey-bg section">
		<div class="container">
			<h2 class="text_name">Interactive games and rewards motivate children<br>to learn and improve their scores</h2>
			<div class="section_center">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 col-xs-12">
						<div class="img_tivi">
							<img src="images/img_splashmath/widescreen.gif">
						</div>
					</div>
					<div class="content_center">
						<div class=" col-sm-4 col-xs-12 ">
							<div class="col-sm-3">
								<img src="images/img_splashmath/gamification.png">
							</div>
							<div class="col-sm-9 text_box">
								<h4> Fun Rewards</h4>
								<p> Get coins for each correct answer and redeem coins for virtual pets</p>
							</div>
						</div>
						<div class=" col-sm-4 col-xs-12 ">
							<div class="col-sm-3">
								<img src="images/img_splashmath/multiple_thems.png">
							</div>
							<div class=" col-sm-9 text_box">
								<h4>Multiple Themes</h4>
								<p>Children explore the world of math in a Jungle, Candy or a Space theme</p>
							</div>
						</div>
						<div class=" col-sm-4 col-xs-12 ">
							<div class="col-sm-3">
								<img src="images/img_splashmath/device_agnostic.png">
							</div>
							<div class="col-sm-9 text_box">
								<h4>Anytime Anywhere</h4>
								<p>Play on device of your child’s choice - iPad, iPhone or desktop</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> {{-- end section --}}
	<div class="home-section white-bg aside">
		<div class="container">	
			<h2 class="text_name">Get Real-Time Progress Dashboard that Pinpoints Trouble Spots</h2>
			<div class="content_bt">
				<div class="row">
					 <div class="col-sm-3 col-xs-12">
						<div class="email">
							<img src="images/img_splashmath/email.png" alt="email_img" class="big_device">
							<p class="aside_text">Email reports in your inbox every week</p>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="laptop">
							<img src="images/img_splashmath/laptop.png" alt="laptop_img" class="big_device">
							<p class="aside_text">Dashboard with detailed progress reports</p>
						</div>
					</div>
					<div class="col-sm-3 col-xs-12">
						<div class="iphone">
							<img src="images/img_splashmath/iphone.png" alt="iPhone_img" class="big_device" >
						    <p class="aside_text">Monitor activity on your iPhone using our Parent Connect App</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> {{-- end aside --}}
	<div class="home-section grey-bg teacher">
		<div class="container">
			<h2 class="text_name">Over 15 Million kids and 50,000 schools love Splash Math</h2>
			<div class="col-sm-6 col-sm-offset-3 text-left">
				<div class="item">
					<img class="img_avata" src="images/img_splashmath/avata.jpg">
					<span>Splash Math is great because as you get things correct it increases in complexity — so it continues to challenge even those learners that are ready to move on.</span><br>
					<span style="color: #afaaa2">Kristi Meeuwse</span><br><small>Teacher, Drayton Hall Elementary School,<br>Charleston, SC</small><span style="float:right;"><small>source: https://www.apple.com</small></span></span>
				</div>
			</div>
		</div>
	</div>{{--  end teacher --}}
</div>
 {{-- end.content --}}			
<footer>
	<div class="container">
		<div class="footer">
			<div class="row">
				<div class="col-sm-3">
					<p class="one"><a href="">Math Games for Kids</a></p>
					<p><a href="#">Multiplication</a></p>
					<p><a href="">Fraction Games</a></p>
					<p><a href="">Division Games</a></p>
					<p><a href="">Number Games</a></p>
					<p><a href="">Addition Games</a></p>
					<p><a href="">Subtraction Games</a></p>
					<p><a href="">Area and Perimeter Games</a></p>
					<p><a href="">Counting Money Games</a></p>
				</div>
				<div class="col-sm-3">
					<p class="one"><a href="">Free Apps for iPad/iPhone</a></p>
					<p ><a href="">Math Games for Kids</a></p>
					<p ><a href="">Grade 1 Free Math App</a></p>
					<p><a href="">Grade 2 Free Math App</a></p>
					<p ><a href="">Grade 3 Free Math App</a></p>
					<p ><a href="">Grade 4 Free Math App</a></p>
					<p ><a href="">Grade 5 Free Math App</a></p>
				</div>
				<div class="col-sm-3">
					<p class="one"><a href="">Splash Math Content</a></p>
					<p><a href="#"> Math Games</a> </p>
					<p><a href="#"> Math Games for kindergarten</a> </p>
					<p><a href="#"> Math Games for 1st Grader</a> </p>
					<p><a href="#"> Math Gamesfor 2st Grader</a> </p>
					<p><a href="#"> Math Gamesfor 3st Grader</a> </p>
					<p><a href="#"> Math Gamesfor 4st Grader</a> </p>
					<p><a href="#"> Math Gamesfor 5st Grader</a> </p>
					<p><a href="#"> Common Core Math Vocabulary</a> </p>
					<p><a href="#"> Common Core Currioulum</a> </p>
				</div>
				<div class="col-sm-3">
					<p class="one"><a href="">Resources</a></p>
					<p ><a href="">About Us</a></p>
					<p ><a href="">Contact Us</a></p>
					<p ><a href="">Splash Math Blog</a></p>
					<p ><a href="">Splash Math Apps</a></p>
					<p ><a href="">Affiliates</a></p>
					<p ><a href="">Help</a></p>
					<p ><a href="">Help@splashmath.com</a></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="bottom_fo">
				<a href=""><i class="fa fa-facebook-official" aria-hidden="true" style="color: #344976"></i></a>
				<a href=""><i class="fa fa-google-plus-square" aria-hidden="true" style="color: red"></i></a>
				<a href="#"><i class="fa fa-twitter-square" aria-hidden="true" style="color:#477ca2"></i></a>
				<a href="#"><i class="fa fa-pinterest-square" aria-hidden="true" style="color: #99211e"></i></a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="footer_left">
					<img src="images/img_splashmath/avt_footer.png">
					<span style="color: #fff">PRIVACY POLICY</span>  <span><a href="#">Terms of Use</a></span>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="footer_right">
					<span>StudyPad & Splash Math are registered Trademarks of StudyPad, Inc.</span>
				</div>
			</div>
		</div>
	</div>
</footer>

		<!-- jQuery -->
	</body>
</html>