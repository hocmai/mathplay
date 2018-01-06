@include('site.layout.home')

@section('content')
<header class="header">
	<nav class="fixed-nav">
		
	</nav>
	<div class="banner">
		<div class="animation">
			<div class="cloud cloud-1"><img src="{{ asset('/frontend/images/home/cloud-1.png') }}"></div>
			<div class="cloud cloud-2"><img src="{{ asset('/frontend/images/home/cloud-1.png') }}"></div>
			<div class="cloud cloud-3"><img src="{{ asset('/frontend/images/home/cloud-1.png') }}"></div>
			<div class="cloud cloud-4"><img src="{{ asset('/frontend/images/home/cloud-2.png') }}"></div>
			<div class="cloud cloud-5"><img src="{{ asset('/frontend/images/home/cloud-2.png') }}"></div>
			<div class="cloud cloud-6"><img src="{{ asset('/frontend/images/home/cloud-2.png') }}"></div>
			<div class="cloud cloud-7"><img src="{{ asset('/frontend/images/home/cloud-3.png') }}"></div>
			<div class="balloon balloon-1"><img src="{{ asset('/frontend/images/home/balloon1.png') }}"></div>
			<div class="balloon balloon-2"><img src="{{ asset('/frontend/images/home/balloon2.png') }}"></div>
			<div class="balloon balloon-3"><img src="{{ asset('/frontend/images/home/balloon3.png') }}"></div>
			<div class="balloon balloon-4"><img src="{{ asset('/frontend/images/home/balloon4.png') }}"></div>
			<div class="ship ship-1"><img src="{{ asset('/frontend/images/home/ship1.png') }}"></div>
			<div class="ship ship-2"><img src="{{ asset('/frontend/images/home/ship2.png') }}"></div>
		</div>
		{{-- <div class="container-fluid">
			<div class="row">
				<div class="pippo-animation col-xs-12 col-sm-5">
					<img src="{{ asset('/frontend/images/home/pippo.png') }}">
				</div>
				<div class="caption col-xs-12 col-sm-7">
					<div class="caption-wrap">
						<h1>The Complete K-5 Math Learning Program Built for Your Child</h1>
						<p>Boost Confidence. Increase Scores. Get Ahead.</p>
						<a class="button"href="#signup-modal">Parents, Get Started for Free</a>
						<a class="button"href="#signup-modal">Teachers, Get Started for Free</a>
					</div>
				</div>
			</div>
		</div> --}}
	</div>
</header>

@show