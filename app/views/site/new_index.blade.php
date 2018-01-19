@extends('site.layout.home')

@section('class')
{{ $class = 'home-page' }}
@stop

@section('content')
<header class="header home">
    <nav class="navbar fixed-nav navbar-default navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset('/frontend/images/logo_hocmai.png') }}"></a>
            <div class="member-area">
                @include('site.common.user-menu')
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
                        <h1>Chương trình học toán toàn diện cho các bé mẫu giáo và tiểu học</h1>
                        <p>Tăng tự tin. Cải thiện điểm số. Hoàn thiện năng lực tư duy.</p>
                       {{--  <a class="button"href="#signup-modal">Học thử</a> --}}
                        <a class="button"href="#signup-modal">Học thử</a>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- End banner --}}

    <div class="light-bar">
        <div class="container-fluid">
            <div class="left pull-left">
                <span></span>
                <img src="{{-- {{ asset('frontend/images/home/awards-honors-badge-bed.png') }} --}}">
            </div>
            <a class="link-scroll pull-right" href="#"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
            <div class="right pull-right">
                <span class="counter">{{-- 50,000+<br>Schools --}}</span>
                <span class="teacher">{{-- 15 Million+<br>Learners --}}</span>
            </div>
        </div>
    </div>

</header>
<div class="content-wrapper">
    <section class="home-section map-section white-bg">
        <div class="container">
            <h2 class="block-title">Bài tập được cá nhân hóa dành riêng cho mỗi bé
                <br>Gồm đầy đủ trình độ từ dễ đến khó</h2>
            <div class="block-content">
                <div class="map-wrap">
                    <img src="{{ asset('frontend/images/home/personalized_report.png') }}">
                </div>
            </div>
        </div>
    </section>

    <section class="home-section intro-section grey-bg">
        <div class="container">
            <h2 class="block-title">Câu hỏi sinh động giúp trẻ hứng thú học<br>và hoàn thiện các năng lực toán học</h2>
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
                                <h3>Giao diện sống động</h3>
                                <span>Hình ảnh sống động, thân thiện giúp tăng hứng thú khi làm bài</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 item padding0">
                            <div class="col-xs-4 col-sm-3 img padding0">
                                <img src="{{ asset('frontend/images/home/device_agnostic.png') }}">
                            </div>
                            <div class="col-xs-9 col-sm-9 text">
                                <h3>Mọi lúc, mọi nơi</h3>
                                <span>Sử dụng trên tất cả các thiết bị: máy tính, máy tính bảng, điện thoại</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section stastic-section white-bg">
        <div class="container">
            <h2 class="block-title">Báo cáo kết quả học giúp chỉ rõ các kĩ năng còn yếu</h2>
            <div class="block-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 item email padding0">
                        <img src="{{ asset('frontend/images/home/email.png') }}">
                        <h3>Báo cáo học tập định kì qua email</h3>
                    </div>
                    <div class="col-xs-12 col-sm-6 item dashboard">
                        <img src="{{ asset('frontend/images/home/laptop.png') }}">
                        <h3>Bảng tiến độ học trực quan, dễ theo dõi</h3>
                    </div>
                    <div class="col-xs-12 col-sm-3 item mobile padding0">
                        <img src="{{ asset('frontend/images/home/iPhone.png') }}">
                        <h3>Kiểm tra việc học của con ngay trên điện thoại</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section comment-section grey-bg">
        <div class="container">
            <h2 class="block-title">Được hơn 1.000 bạn nhỏ tại 20 tỉnh thành trên cả nước tin tưởng sử dụng</h2>
            <div class="block-content">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-left">
                    <div class="content">
                        <img src="{{'frontend/images/home/kristie.jpg'}}">
                        <p class="desc">Ứng dụng học toán tuyệt vời cho các con lứa tuổi tiểu học.</p>
                        <span class="author">Thầy Bùi Minh Mẫn</span>
                        <span class="address">Giáo viên<br>Việt Trì, Phú Thọ</span>
                        <span class="source">source: https://www.hocmai.com</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> {{-- End content wrapper --}}
@stop