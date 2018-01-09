@include('demo.common.header')

 <div class="content">
    <div class="container">
	    <h1 class="course">@yield('title')</h1>
	    <div class="row">
	    	<div class="col-sm-10 col-xs-12" >
				@section('content')
				@show
			</div>
			<div class="col-sm-2 col-xs-12" id="sidebar-right">
				@section('sidebar')
				@show
			</div>
		</div>
	</div>
</div>

@include('demo.common.footer')