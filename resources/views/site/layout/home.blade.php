<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ</title>

    {!! app('html')->style('frontend/css/bootstrap.min.css') !!}
    {!! app('html')->style('frontend/css/font-awesome.min.css') !!}
    {!! app('html')->style('frontend/css/hover-min.css') !!}
    {!! app('html')->style('frontend/css/animation.css') !!}
    {!! app('html')->style('frontend/css/home-style.css') !!}
    {!! app('html')->style('frontend/css/new-style.css') !!}
    {!! app('html')->style('frontend/css/home_layout.css') !!}
    {!! app('html')->style('frontend/css/responsive_lesson.css')  !!}
    
	{!! app('html')->script('frontend/js/jquery.min.js') !!}
	{!! app('html')->script('frontend/js/bootstrap.min.js') !!}
	{!! app('html')->script('frontend/js/jquery-ui.js') !!}
	{!! app('html')->script('frontend/js/myscript.js') !!}
</head>

<body class="@yield('class')">
	<div class="wrapper">
		@yield('content')
	</div> {{-- End wrapper --}}
</body>
