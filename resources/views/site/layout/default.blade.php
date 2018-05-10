@include('site.common.header') 
    
@include('site.common.main-menu')

@section('breadcrumb')
@show

@section('slide')
@show
<main>
    @section('content_front')
    @show

    @section('content')
    @show
</main>


@section('footer_content')
	@parent
    <footer class="footer">
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
                <div class="content pull-left">&copy; 2018 phát triển và xây dựng bởi HOCMAI</div>
                <div class="social pull-right">
                    <a href="" title="" class="inline-block"><img src="{{ asset('frontend/images/f.png')}}" class="img-responsive" alt=""/></a>
                    <a href="" title="" class="inline-block"><img src="{{ asset('frontend/images/g.png')}}" class="img-responsive" alt=""/></a>
                </div>
            </div>
        </div>
    </footer>
@stop

@include('site.common.footer')