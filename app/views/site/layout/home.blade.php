<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ</title>

    {{ HTML::style('frontend/css/bootstrap.min.css')}}
    {{ HTML::style('frontend/css/font-awesome.min.css')}}
    {{ HTML::style('frontend/css/hover-min.css')}}
    {{ HTML::style('frontend/css/animation.css')}}
    {{ HTML::style('frontend/css/home-style.css')}}
    {{ HTML::style('frontend/css/new-style.css')}}
    {{ HTML::style('frontend/css/home_layout.css')}}
    
	{{ HTML::script('frontend/js/jquery.min.js')}}
	{{ HTML::script('frontend/js/bootstrap.min.js')}}
	{{ HTML::script('frontend/js/jquery-ui.js')}}
	{{ HTML::script('frontend/js/myscript.js')}}
</head>

<body class="@yield('class')">
	<div class="wrapper">
		@yield('content')
	</div> {{-- End wrapper --}}
</body>
