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
	@show
</head>

<body class="@yield('class')">
<div id="full_page" class="full_page">