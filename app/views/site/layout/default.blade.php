<!DOCTYPE html>
<html lang="en">
@include('site.common.header')

<body>
<div id="full_page" class="full_page">
    <div class="menu-mobile header-content clearfix hidden-lg">
        <a class="logo" href="#" title="">
            <img src="{{ asset('frontend/images/logo.png')}}" class="img-responsive" alt=""/>
        </a>
        <div id="button" class="button"></div>
        <ul class="header-menu-left no-list-style">
            <li>
                <a class="dang-nhap hvr-shadow" data-toggle="modal" data-target="/user/login" href="#" title="">Đăng nhập <span class="fa fa-key"></span></a>
            </li>
            <li>
                <a class="dang-ky hvr-shadow" data-toggle="modal" data-target="/user/register" href="#" title="">Đăng ký <span class="fa fa-lock"></span></a>
            </li>

            <li><a href="index.php" title="Trang chủ">Trang chủ</a></li>
            <li>
                <a href="#" title="">Lớp học</a>
                <ul>
                    <li><a href="#" title="">Lớp học 1</a></li>
                    <li><a href="#" title="">Lớp học 2</a></li>
                </ul>
            </li>
            <li><a href="#" title="">Giới thiệu</a></li>
            <li><a href="#" title="">Liên hệ</a></li>
        </ul>
    </div>

    <header class="hidden-xs hidden-sm">
        <div class="box-dang-nhap">
            <div class="container">

                <a class="dang-ky hvr-shadow" href="{{ route('user.register') }}" title="">Đăng ký</a>
                <a class="dang-nhap hvr-shadow" href="{{ route('user.login') }}" title="">Đăng nhập</a>

            </div>

        </div>
        <div class="box-menu">
            <div class="container">
                <a class="logo" href="#" title="">
                    <img src="{{ asset('frontend/images/logo.png')}}" class="img-responsive" alt=""/>
                </a>
                <div class="menu">
                    <div class="rmm style">
                        <ul class="fl hidden-xs hidden-sm">
                            <li class="active">
                                <a href="index.html">
                                    <div class="bg-hv"><span></span></div>
                                    Trang chủ
                                </a>
                            </li>
                            <li>
                                <a href="lop-hoc.html">
                                    <div class="bg-hv"><span></span></div>
                                    Lớp học
                                </a>
                                <ul>
                                    <li><a href="lop-hoc.html">Lớp 1</a></li>
                                    <li><a href="lop-hoc.html">Lớp 2</a></li>
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
    <div class="bracum">
        <div class="container">
            <ol class="bracum-mobile">
                <li><a href="#">Trang chủ</a></li>
            </ol>
        </div>
    </div>

    @section('slide')
    @show
<main>

    @yield('content_front')

    @section('content')
    @show

</main>
@include('site.common.footer')
<div id="lof_go_top">
    <span class="ico_up"></span>
</div>

</div>

</body>
</html>