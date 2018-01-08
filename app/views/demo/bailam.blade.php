<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" ">
    <link rel="stylesheet" type="text/css" href=" {{ asset('') }} ">
    {{ HTML::style('frontend/css/font-awesome.min.css')}}
    {{ HTML::style('frontend/css/democss.css')}}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
 </head>
<body >
    <header class="header">
        <div class="container">
            <div class="txt">
                <ol>
                    <li><a href="#"><strong><</strong></a></li>
                    <li><a href="/">Trang Chủ></a></li>
                    <li><a href="#">Lớp 1></a></li>
                    <li><a href="#">Môn toán</a></li>
                </ol>
            </div>
            <div class=" logo">
                <ol>
                    <li><input type="text" name="" value="xin chào Trần Văn Bi "></li>
                    <li><img src="{{ asset('frontend/images/avata.jpg') }}"></li>
                </0l> 
            </div>
        </div>
    </header>       
    <!-- end header -->

  
 <!-- end content -->
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
                <div class="content pull-left">&copy; 2017 phát triển và xây dựng bởi HOCMAI</div>
                <div class="social pull-right">
                    <a href="" title="" class="inline-block"><img src="{{ asset('/images/image_demo/icon_facebook.jpg') }}" class="img-responsive" alt=""/></a>
                    <a href="" title="" class="inline-block"><img src="{{ asset('/images/image_demo/google.jpg') }}" class="img-responsive" alt=""/></a>
                </div>
            </div>

        </div>
    </footer>
    <!-- end footer -->


</body>
</html>