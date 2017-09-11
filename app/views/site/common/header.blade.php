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
    
    @section('js_header')
    {{ HTML::script('frontend/js/jquery.min.js')}}
    {{ HTML::script('frontend/js/bootstrap.min.js')}}

    {{ HTML::script('frontend/js/slick.min.js')}}
    {{ HTML::script('frontend/js/menu-mobile.js')}}
    {{ HTML::script('frontend/js/myscript.js')}}

    {{ HTML::script('frontend/js/main.js')}}
    @show
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="@yield('class')">
<div id="full_page" class="full_page">