<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

	@section('css_header')
	{{ HTML::style('frontend/css/bootstrap.min.css')}}
	{{ HTML::style('frontend/css/font-awesome.min.css')}}
	{{ HTML::style('frontend/css/hover-min.css')}}
	{{ HTML::style('frontend/css/slick-theme.css')}}
	{{ HTML::style('frontend/css/slick.css')}}
	{{ HTML::style('frontend/css/menu.css')}}
	{{ HTML::style('frontend/css/default.css')}}
	{{ HTML::style('frontend/css/menu-mobile.css')}}
	{{ HTML::style('frontend/css/style.css')}}
	{{ HTML::style('frontend/css/mystyle.css')}}
    {{ HTML::style('frontend/css/new-style.css')}}
    {{ HTML::style('frontend/css/home_layout.css')}}
    {{HTML::style('questions/DemSoTrongKhung10/css/style.css')}}
	{{ HTML::style('frontend/css/responsive_lesson.css') }}
	@show
	
	<!-- Hotjar Tracking Code for http://tieuhoc.hocmai.vn -->
	<script>
	(function(h,o,t,j,a,r){
	h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	h._hjSettings={hjid:670738,hjsv:6};
	a=o.getElementsByTagName('head')[0];
	r=o.createElement('script');r.async=1;
	r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	a.appendChild(r);
	})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
</head>

<body class="@yield('class')">
<div id="full_page" class="full_page">