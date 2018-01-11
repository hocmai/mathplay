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
    {{ HTML::style('frontend/css/democss.css')}}
	@show

	@section('js_header')
	{{ HTML::script('frontend/js/jquery.min.js')}}
	{{ HTML::script('frontend/js/bootstrap.min.js') }}
	@show
	
</head>
<body>
	 
<header class="header">
	<div class="container">
		@section('breadcrumb')
	    
	    @show
	    <div class=" logo">
	        <p><span class="hello_logo">Xin chào<span class="name_hello">Trần Văn Bi</span></span><img src="{{ asset('frontend/images/avata.jpg') }}"></p>
	    </div>
	</div>      
</header>