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
<div class="content-wrapper">
    <section class="home-section map-section white-bg">
        <div class="container">
            <h2 class="block-title">Get Personalized Learning Path Fit for Catching up,<br>Enrichment or Regular Practice</h2>
            <div class="block-content">
                <div class="map-wrap">
                    <img src="{{ asset('frontend/images/home/personalized_report.png') }}">
                </div>
            </div>
        </div>
    </section>

    <section class="home-section intro-section grey-bg">
        <div class="container">
            <h2 class="block-title">Interactive games and rewards motivate children <br>to learn and improve their scores</h2>
            <div class="block-content">
                <img src="{{ asset('frontend/images/home/widescreen.gif') }}">
                <div class="intro-row text-left">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 item padding0">
                            <div class="col-xs-4 col-sm-3 img padding0">
                                <img src="{{ asset('frontend/images/home/gamification.png') }}">
                            </div>
                            <div class="col-xs-9 col-sm-9 text">
                                <h3>Fun Rewards</h3>
                                <span>Get coins for each correct answer and redeem coins for virtual pets</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 item padding0">
                            <div class="col-xs-4 col-sm-3 img padding0">
                                <img src="{{ asset('frontend/images/home/multiple_thems.png') }}">
                            </div>
                            <div class="col-xs-9 col-sm-9 text">
                                <h3>Multiple Themes</h3>
                                <span>Children explore the world of math in a Jungle, Candy or a Space theme</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 item padding0">
                            <div class="col-xs-4 col-sm-3 img padding0">
                                <img src="{{ asset('frontend/images/home/device_agnostic.png') }}">
                            </div>
                            <div class="col-xs-9 col-sm-9 text">
                                <h3>Anytime Anywhere</h3>
                                <span>Play on device of your child’s choice - iPad, iPhone or desktop</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section stastic-section white-bg">
        <div class="container">
            <h2 class="block-title">Get Real-Time Progress Dashboard that Pinpoints Trouble Spots</h2>
            <div class="block-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 item email padding0">
                        <img src="{{ asset('frontend/images/home/email.png') }}">
                        <h3>Email reports in your inbox every week</h3>
                    </div>
                    <div class="col-xs-12 col-sm-6 item dashboard">
                        <img src="{{ asset('frontend/images/home/laptop.png') }}">
                        <h3>Dashboard with detailed progress reports</h3>
                    </div>
                    <div class="col-xs-12 col-sm-3 item mobile padding0">
                        <img src="{{ asset('frontend/images/home/iPhone.png') }}">
                        <h3>Monitor activity on your iPhone using our Parent Connect App</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section comment-section grey-bg">
        <div class="container">
            <h2 class="block-title">Over 15 Million kids and 50,000 schools love Splash Math</h2>
            <div class="block-content">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-left">
                    <div class="content">
                        <img src="{{'frontend/images/home/kristie.jpg'}}">
                        <p class="desc">Splash Math is great because as you get things correct it increases in complexity — so it continues to challenge even those learners that are ready to move on.</p>
                        <span class="author">Kristi Meeuwse</span>
                        <span class="address">Teacher, Drayton Hall Elementary School,<br>Charleston, SC</span>
                        <span class="source">source: https://www.apple.com</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> {{-- End content wrapper --}}
@stop