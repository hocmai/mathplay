@include('demo.common.header')

@include('demo.common.main-menu')

@include('demo.common.content')

<header class="header">
	@section('header')

	@show
</header>
 <div class="content">
    <div class="container">


	@section('content')

	@show
	</div>
</div>

@include('demo.common.footer')