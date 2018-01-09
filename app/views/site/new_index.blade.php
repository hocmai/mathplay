@extends('site.layout.home')

@section('class')
{{ $class = 'home-page' }}
@stop

@section('content')
<header class="header">
    <nav class="navbar fixed-nav navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu-mathplay" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="{{ asset('/frontend/images/icon-gioithieu.png') }}"></a>
            </div>
            <div class="collapse navbar-collapse pull-right" id="main-menu-mathplay">
                <ul class="nav navbar-nav">
                    <li><a href="#">Curriculum <span class="caret"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Features & Plans</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Case Studies</a></li>
                    <li><a href="#" class="login user-link">Sign in</a></li>
                    <li><a href="#" class="register user-link">Sign up</a></li>
                </ul>
            </div>
        </div>
    </nav> {{-- End main menu --}}

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
        </div> {{-- End animation --}}

        <div class="container-fluid">
            <div class="banner-content">
                <div class="col-xs-12 col-sm-4">
                    <div class="pippo-animation">
                        <img src="{{ asset('/frontend/images/home/pippo.png') }}" width="415px">
                        <span class="blink-img"></span>
                    </div>
                </div>
                <div class="caption col-xs-12 col-sm-8">
                    <div class="caption-wrap">
                        <h1>The Complete K-5 Math Learning Program Built for Your Child</h1>
                        <p>Boost Confidence. Increase Scores. Get Ahead.</p>
                        <a class="button"href="#signup-modal">Parents, Get Started for Free</a>
                        <a class="button"href="#signup-modal">Teachers, Get Started for Free</a>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- End banner --}}

    <div class="light-bar">
        <div class="container-fluid">
            <div class="left pull-left">
                <span>Won Numerous<br>Awards & Honors</span>
                <img src="{{ asset('frontend/images/home/awards-honors-badge-bed.png') }}">
            </div>
            <a class="link-scroll pull-right" href="#"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
            <div class="right pull-right">
                <span class="counter">50,000+<br>Schools</span>
                <span class="teacher">15 Million+<br>Learners</span>
            </div>
        </div>
    </div>

</header>
@stop