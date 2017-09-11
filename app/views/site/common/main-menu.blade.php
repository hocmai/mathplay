<?php $grades = Grade::all();
$ssoLib = new HocmaiOAuth2(CLIENT_ID, CLIENT_SECRET, CLIENT_REDIRECT_URI);

?>

<div class="menu-mobile header-content clearfix hidden-lg">
    <a class="logo" href="#" title="">
        <img src="{{ asset('frontend/images/logo.png')}}" class="img-responsive" alt=""/>
    </a>
    <div id="button" class="button"></div>
    <ul class="header-menu-left no-list-style">
        <li>
            <a class="dang-nhap hvr-shadow hocmai-oauth-login" data-toggle="modal" data-target="/user/login" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng nhập <span class="fa fa-key"></span></a>
        </li>
        <li>
            <a class="dang-ky hvr-shadow hocmai-oauth-login" data-toggle="modal" data-target="/user/register" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng ký <span class="fa fa-lock"></span></a>
        </li>

        <li><a href="index.php" title="Trang chủ">Trang chủ</a></li>
        <li>
            <a href="#">
                <div class="bg-hv"><span></span></div>
                Lớp học
            </a>
            <ul>
                @foreach($grades as $grade)
                    <li>
                        @if(Auth::admin()->check() | $grade->status == 1)
                            {{ link_to_action('SiteGradeController@show', $grade->title, ['grade_slug' => $grade->slug], []) }}
                        @endif
                    </li>
                @endforeach
            </ul>
        </li>
        <li><a href="#" title="">Giới thiệu</a></li>
        <li><a href="#" title="">Liên hệ</a></li>
    </ul>
</div>

<!-- Desktop screen -->
<header class="hidden-xs hidden-sm">
    <div class="box-dang-nhap">
        <div class="container">
            @if(Auth::user()->check())
                <div class="box-info">
                    <div class="text">
                        <div class="avatar">
                            <img src="{{ asset('frontend/images/avata.jpg') }}" class="img-responsive mauto" alt="">
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->get()->username }}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ action('SiteUserController@logout') }}">Thoát</a></li>
                            </ul>
                        </div>
                        <span>Xin chào</span>
                        <div class="clr"></div>
                    </div>
                </div>
            @else
            
                <a class="dang-ky hvr-shadow hocmai-oauth-login" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng ký</a>
                <a class="dang-nhap hvr-shadow hocmai-oauth-login" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng nhập</a>
            @endif
        </div>
    </div>
    <div class="box-menu">
        <div class="container">
            <a class="logo" href="/" title="">
                <img src="{{ asset('frontend/images/logo.png')}}" class="img-responsive" alt=""/>
            </a>
            <div class="menu">
                <div class="rmm style">
                    <ul class="fl hidden-xs hidden-sm">
                        <li class="active">
                            <a href="/">
                                <div class="bg-hv"><span></span></div>
                                Trang chủ
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="bg-hv"><span></span></div>
                                Lớp học
                            </a>
                            <ul>
                                @foreach($grades as $grade)
                                    <li>
                                        @if(Auth::admin()->check() | $grade->status == 1)
                                            {{ link_to_action('SiteGradeController@show', $grade->title, ['grade_slug' => $grade->slug], []) }}
                                        @endif
                                    </li>
                                @endforeach
                                <li class="bg-color"></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.html">
                                <div class="bg-hv"><span></span></div>
                                Giới thiệu
                            </a>
                        </li>
                        <li>
                            <a href="index.html">
                                <div class="bg-hv"><span></span></div>
                                Liên hệ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>