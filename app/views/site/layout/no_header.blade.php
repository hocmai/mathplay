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
    {{-- {{ HTML::style('frontend/css/hover-min.css')}}
    {{ HTML::style('frontend/css/slick-theme.css')}}
    {{ HTML::style('frontend/css/slick.css')}}
    {{ HTML::style('frontend/css/menu.css')}}
    {{ HTML::style('frontend/css/default.css')}}
    {{ HTML::style('frontend/css/menu-mobile.css')}}
    {{ HTML::style('frontend/css/style.css')}} --}}
    {{ HTML::style('frontend/css/new-style.css')}}
    @show
    
    <!-- Hotjar Tracking Code for http://tieuhoc.hocmai.vn -->
    <script>
    (function(h,o,t,j,a,r){
    h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
    h._hjSettings={hjid:670738,hjsv:6};
    a=o.getElementsByTagName('head')[0];
    r=o.createElement('script');r.async=1;
    r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
    a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</head>

<body class="@yield('class')">
<div id="full_page" class="full_page">

@section('breadcrumb')
@show

<main>
    @section('content')
    @show
</main>


@section('footer_content')
	@parent
    <footer>
        <div class="container">
            <div class="des">
                Cơ quan chủ quản: Công ty Cổ phần Đầu tư và Dịch vụ Giáo dục <br/>
                Địa chỉ: Tầng 4, Tòa nhà 25T2, Đường Nguyễn Thị Thập, Phường Trung Hoà, Quận Cầu Giấy, Hà Nội.<br/>
                Tel: +84 (4) 3519-0591 Fax: +84 (4) 3519-0587<br/>
                Giấy phép cung cấp dịch vụ mạng xã hội trực tuyến số 597/GP-BTTTT Bộ Thông tin và Truyền thông cấp ngày 30/12/2016.<br/>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="content pull-left">&copy; 2017 phát triển và xây dựng bởi HOCMAI</div>
                <div class="social pull-right">
                    <a href="" title="" class="inline-block"><img src="{{ asset('frontend/images/f.png')}}" class="img-responsive" alt=""/></a>
                    <a href="" title="" class="inline-block"><img src="{{ asset('frontend/images/g.png')}}" class="img-responsive" alt=""/></a>
                </div>
            </div>

        </div>
    </footer>
@stop

@include('site.common.footer')