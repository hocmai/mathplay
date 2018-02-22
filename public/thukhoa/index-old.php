<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta name="robots" content="index, follow">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" name="viewport">
    <title>Bí mật của thủ khoa, dành cho tất cả mọi người</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-68310021-1', 'auto');
        ga('send', 'pageview');
        <!-- Facebook Pixel Code -->
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','//connect.facebook.net/en_US/fbevents.js');

        fbq('init', '1646777965590458');
        fbq('track', "PageView");
        <!-- End Facebook Pixel Code -->
        $(document).ready(function(){
            $("#single_button").click(function(){
                $(window).scrollTop($('#content').offset().top);
            });
            $(".contact_phone").click(function(){
                $(window).scrollTop($('#register_form').offset().top);
            });

            $("#register_name").focus(function(){
                    $("#register_name").css('border','1px solid #818181');
                    $(".register_name_error").html('');
            });

            $("#register_email").focus(function(){
                $("#register_email").css('border','1px solid #818181');
                $(".register_email_error").html('');
            });

            $("#register_phone").focus(function(){
                $("#register_phone").css('border','1px solid #818181');
                $(".register_phone_error").html('');
            });

            $("#register_address").focus(function(){
                $("#register_address").css('border','1px solid #818181');
                $(".register_address_error").html('');
            });

            var rgemail=/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/;
            var rgphone=/^[\(\)\s\-\+\d]{10,17}$/;

            /*** validate form by javascript ***/
            $("#submit_register_frm").click(function(){
                var checkname=true,check_email=true,check_phone=true,check_address=true;
                if($("#register_name").val()=='' || $("#register_name").val().trim()==''){
                    $("#register_name").css('border','1px solid red');
                    $(".register_name_error").html('Vui lòng nhập họ tên');
                    checkname=false;
                }else{ checkname=true; }

                var rs_email_primary= rgemail.test($("#register_email").val());
                var rs_phone=rgphone.test($("#register_phone").val());
                if(rs_email_primary==true)
                {
                    $("#register_email").css('border','1px solid #818181');
                    $(".register_email_error").html('');
                    check_email=true;

                } else{
                    check_email=false;
                    $("#register_email").css('border','1px solid red');
                    $(".register_email_error").html('Vui lòng nhập email hợp lệ');
                }

                if(rs_phone==true)
                {
                    $("#register_phone").css('border','1px solid #818181');
                    $(".register_phone_error").html('');
                    check_phone=true;

                } else{
                    $("#register_phone").css('border','1px solid red');
                    $(".register_phone_error").html('Vui lòng nhập số điện thoại từ 9-11 số');
                    check_phone=false;
                }

                if($("#register_address").val()=='0' || parseInt($("#register_address").val())==0){
                    $("#register_address").css('border','1px solid red');
                    $(".register_address_error").html('Vui lòng chọn một tỉnh');
                    check_address=false;
                }else{
                    check_address=true;
                }

                if(checkname==true && check_address==true && check_email==true && check_phone==true){
                    return true;
                }else{
                    return false;
                }

            });


        });
    </script>
</head>
<body>
<?php
if(isset($_GET['register'])){
    $JS='';
    if($_GET['register']=='success'){
        $JS='<script type="text/javascript">alert("Bạn đã đăng ký tư vấn thành công");</script>';
    }else{
        $JS='<script type="text/javascript">alert("Bạn đã đăng ký thất bại, vui lòng thử lại.");</script>';
    }
    echo $JS;
}
?>
<noscript><img height="1" width="1" style="display:none"  src="https://www.facebook.com/tr?id=1646777965590458&ev=PageView&noscript=1" /></noscript>
<header role="banner" id="banner">
    <div class="container">
        <nav id="bs-navbar">
            <ul id="main_header" class="nav navbar-nav">
                    <div id="middle_header_content">
                            <div id="big_header_title">
                                    <img alt="Biết cách học thì đỡ cực nhọc" src="img/big_title.png" style="width: 70%;" />
                            </div>
                            <div id="secret_word">» Bí quyết luyện thi của thủ khoa, dành riêng cho bạn «</div>
                    </div>
                    <div id="single_button">&nbsp;</div>

            </ul>

        </nav>

    </div>
</header>

<div id="content">
    <div class="container">
        <div id="main_group">
                <div class="box_group_content">
                            <div class="header_group_box">
                                    <div id="fist_header_group" style="padding-left:60px;">Khóa học tập hợp <span>bài tập và</span></div>
                                    <div id="second_header_group"><span>bài giải từ dễ đến khó</span> của các thủ khoa</div>
                            </div>

                            <div id="list_group_name">
                                 <p style="padding-left:85px;margin:0;">"Mình dành chủ yếu thời gian luyện tập</p>
                                 <p style="padding-left:30px;">để <span>làm nhanh, chắc chắn bài dễ</span>, rồi mới tới bài khó"</p>
                            </div>

                            <div id="list_article_name">
                                    <p style="padding-left:90px;margin:0;"><strong>Vũ Thị Diệu</strong> - Thủ khoa Đại Học Ngoại Thương</p>
                                    <p style="padding-left:80px;">29 điểm, khối A, THPT Lê Hồng Phong - Nam Định</p>
                            </div>
                </div>
        </div>
    </div>
</div>

<div id="research">
       <div class="container">
                <div id="content_research">
                    <div class="header_title_research">
                                Học đúng trọng tâm nhờ
                    </div>
                    <div class="content_title_research">
                              tư vấn lộ trình
                    </div>
                    <div class="footer_title_research">
                              của cố vấn học tập
                    </div>

                </div>
        </div>
</div>

<div id="guide">
        <div class="container">
                    <div id="content_guide">
                                <div class="box_faqs">
                                        <p>Tiết kiệm thời gian với dịch vụ</p>
                                        <p class="faqs_special"><span>HỎI ĐÁP KHÔNG GIỚI HẠN</span></p>
                                </div>

                                <div class="box_list_faqs">
                                        <p>- Giải đáp mọi thắc mắc trong chương trình thi đại học.</p>
                                        <p>- Hỏi bất cứ lúc nào, không giới hạn, trả lời trong 24h</p>
                                        <p>- 10 trợ giúp khẩn cấp mỗi tháng, trả lời ngay trong 20 phút.</p>
                                </div>
                                <div id="note_name_faqs">Trần Lê Lan Chi 27 điểm, khối D1. THPT Chuyên Vĩnh Phúc - Vĩnh Phúc</div>
                    </div>
        </div>
</div>

<div id="design">
    <div class="container">
            <div id="content_design">
                    <div class="design_header">
                            Khóa học được thiết kế theo phương pháp 2PASS
                    </div>
                    <div class="relation_design">
                           &nbsp;
                    </div>
            </div>
    </div>
</div>

<div id="box_choose_course">
    <div class="border_content">
        <div class="container">
                <div id="box_content_course">
                            <div id="header_sub_course">
                                Lựa chọn khóa học
                            </div>
                            <div id="box_list_course">
                                    <div class="box_grid_course padding_left_course">
                                            <div class="grid_course">
                                                        <div class="heading_title_course">
                                                                <figure>
                                                                    <img alt="logo" src="img/toan.png" style="width:95px;height:88px;" />
                                                                    <figcaption><span class="color_math">Thủ khoa Toán</span> </figcaption>
                                                                </figure>
                                                        </div>
                                                        <div class="box_summary_course">
                                                                <div class="grid_item_course">
                                                                    <div class="left_item_course">&nbsp;</div>
                                                                    <div class="right_item_course">
                                                                       Học và ôn trọn vẹn <strong>cả năm</strong>
                                                                    </div>
                                                                </div>

                                                                <div class="grid_item_course">
                                                                    <div class="left_item_course">&nbsp;</div>
                                                                    <div class="right_item_course">
                                                                        <strong>12</strong> chuyên đề, <strong>65</strong> dạng bài
                                                                    </div>
                                                                </div>

                                                                <div class="grid_item_course">
                                                                    <div class="left_item_course">&nbsp;</div>
                                                                    <div class="right_item_course">
                                                                        Hơn <strong>1.000</strong> bài giải chi tiết của thủ khoa, phân loại từ dễ đến khó
                                                                    </div>
                                                                </div>

                                                                <div class="grid_item_course">
                                                                    <div class="left_item_course">&nbsp;</div>
                                                                    <div class="right_item_course">
                                                                        <strong>Cố vấn học tập</strong> giúp xây dựng <strong>kế hoạch học tập</strong>, theo dõi tiến độ và <strong>hỗ trợ suốt năm học</strong>
                                                                    </div>
                                                                </div>

                                                                <div class="grid_item_course">
                                                                    <div class="left_item_course">&nbsp;</div>
                                                                    <div class="right_item_course">
                                                                       10 <strong>trợ giúp khẩn cấp</strong> mỗi tháng, trả lời ngay <strong>trong 20 phút</strong>
                                                                    </div>
                                                                </div>

                                                                <div class="grid_item_course">
                                                                    <div class="left_item_course">&nbsp;</div>
                                                                    <div class="right_item_course">
                                                                        Hỏi miễn phí <strong>không giới hạn 24/7</strong>, trả lời trong vòng 24h
                                                                    </div>
                                                                </div>
                                                                <div class="grid_price color_math">
                                                                    1.299.000 VNĐ
                                                                </div>
                                                        </div>

                                            </div>
                                    </div>

                                    <div class="box_grid_course padding_middle_course">
                                        <div class="grid_course">
                                                        <div class="heading_title_course">
                                                            <figure>
                                                                <img alt="logo" src="img/vatly.png" style="width:96px;height:91px;" />
                                                                <figcaption><span class="color_physic">Thủ khoa Vật lí</span> </figcaption>
                                                            </figure>
                                                        </div>
                                                        <div class="box_summary_course">
                                                            <div class="grid_item_course">
                                                                <div class="left_item_course">&nbsp;</div>
                                                                <div class="right_item_course">
                                                                    Học và ôn trọn vẹn <strong>cả năm</strong>
                                                                </div>
                                                            </div>

                                                            <div class="grid_item_course">
                                                                <div class="left_item_course">&nbsp;</div>
                                                                <div class="right_item_course">
                                                                    <strong>7</strong> chuyên đề, <strong>35</strong> dạng bài
                                                                </div>
                                                            </div>

                                                            <div class="grid_item_course">
                                                                <div class="left_item_course">&nbsp;</div>
                                                                <div class="right_item_course">
                                                                    Hơn <strong>1.500</strong> bài giải chi tiết của thủ khoa, phân loại từ dễ đến khó
                                                                </div>
                                                            </div>

                                                            <div class="grid_item_course">
                                                                <div class="left_item_course">&nbsp;</div>
                                                                <div class="right_item_course">
                                                                    <strong>Cố vấn học tập</strong> giúp xây dựng <strong>kế hoạch học tập</strong>, theo dõi tiến độ và <strong>hỗ trợ suốt năm học</strong>
                                                                </div>
                                                            </div>

                                                            <div class="grid_item_course">
                                                                <div class="left_item_course">&nbsp;</div>
                                                                <div class="right_item_course">
                                                                    10 <strong>trợ giúp khẩn cấp</strong> mỗi tháng, trả lời ngay <strong>trong 20 phút</strong>
                                                                </div>
                                                            </div>

                                                            <div class="grid_item_course">
                                                                <div class="left_item_course">&nbsp;</div>
                                                                <div class="right_item_course">
                                                                    Hỏi miễn phí <strong>không giới hạn 24/7</strong>, trả lời trong vòng 24h
                                                                </div>
                                                            </div>
                                                            <div class="grid_price color_physic">
                                                                1.299.000 VNĐ
                                                            </div>

                                                        </div>
                                        </div>
                                    </div>

                                    <div class="box_grid_course padding_right_course">
                                        <div class="grid_course">
                                                    <div class="heading_title_course">
                                                        <figure>
                                                            <img alt="logo" src="img/english.png" style="width:100px;height:92px;" />
                                                            <figcaption><span class="color_eng">Thủ khoa Tiếng Anh</span> </figcaption>
                                                        </figure>
                                                    </div>

                                                    <div class="box_summary_course">
                                                        <div class="grid_item_course">
                                                            <div class="left_item_course">&nbsp;</div>
                                                            <div class="right_item_course">
                                                                Học và ôn trọn vẹn <strong>cả năm</strong>
                                                            </div>
                                                        </div>

                                                        <div class="grid_item_course">
                                                            <div class="left_item_course">&nbsp;</div>
                                                            <div class="right_item_course">
                                                                <strong>6</strong> chuyên đề, <strong>29</strong> dạng bài
                                                            </div>
                                                        </div>

                                                        <div class="grid_item_course">
                                                            <div class="left_item_course">&nbsp;</div>
                                                            <div class="right_item_course">
                                                                Hơn <strong>2.500</strong> bài giải chi tiết của thủ khoa, phân loại từ dễ đến khó
                                                            </div>
                                                        </div>

                                                        <div class="grid_item_course">
                                                            <div class="left_item_course">&nbsp;</div>
                                                            <div class="right_item_course">
                                                                <strong>Cố vấn học tập</strong> giúp xây dựng <strong>kế hoạch học tập</strong>, theo dõi tiến độ và <strong>hỗ trợ suốt năm học</strong>
                                                            </div>
                                                        </div>

                                                        <div class="grid_item_course">
                                                            <div class="left_item_course">&nbsp;</div>
                                                            <div class="right_item_course">
                                                                10 <strong>trợ giúp khẩn cấp</strong> mỗi tháng, trả lời ngay <strong>trong 20 phút</strong>
                                                            </div>
                                                        </div>

                                                        <div class="grid_item_course">
                                                            <div class="left_item_course">&nbsp;</div>
                                                            <div class="right_item_course">
                                                                Hỏi miễn phí <strong>không giới hạn 24/7</strong>, trả lời trong vòng 24h
                                                            </div>
                                                        </div>
                                                        <div class="grid_price color_eng">
                                                            1.299.000 VNĐ
                                                        </div>

                                                    </div>
                                        </div>
                                    </div>
                            </div>
                </div>
        </div>
    </div>
</div>

<div id="call_us_now">
    <div class="bg_content_footer">
            <div class="container">
                        <div class="content_call_us_now">
                                <div class="content_footer">
                                    <p>Kiểm tra đầu vào và</p>
                                    <p class="big_title_footer">Tư vấn lộ trình miễn phí</p>
                                </div>
                                <div class="contact_phone">
                                    Đăng kí
                                </div>
                        </div>
            </div>
    </div>
</div>

<div id="register_form">
    <div class="container">
        <div id="content_register_form">
                    <div class="box_present">
                        <div class="content_title_register">Khóa học Thủ khoa</div>
                    </div>

                    <div class="box_grid_form">
                            <div class="box_small_form">
                                <form action="register.php" method="post" id="frm_register_record">
                                        <label class="title">Nhận tư vấn ngay: </label>
                                        <div class="form-group">
                                                <input id="register_name" type="text" name="register_name" value="" placeholder="Tên" />
                                                <br/><span class="register_name_error error"></span>
                                        </div>

                                        <div class="form-group">
                                            <input id="register_email" type="email" name="register_email" value="" placeholder="Email" />
                                            <br/><span class="register_email_error error"></span>
                                        </div>

                                        <div class="form-group">
                                            <input id="register_phone" type="text" name="register_phone" value="" placeholder="Điện thoại" />
                                            <br/><span class="register_phone_error error"></span>
                                        </div>

                                        <div class="form-group">
                                            <select id="register_address" name="register_address" class="form-control">
                                                <option selected="selected" value="0">Tỉnh</option>
                                                <option value="Hà Nội">Hà Nội</option>
                                                <option value="Hà Giang">Hà Giang</option>
                                                <option value="Cao Bằng">Cao Bằng</option>
                                                <option value="Bắc Kạn">Bắc Kạn</option>
                                                <option value="Tuyên Quang">Tuyên Quang</option>
                                                <option value="Lào Cai">Lào Cai</option>
                                                <option value="Lai Châu">Lai Châu</option>
                                                <option value="Sơn La">Sơn La</option>
                                                <option value="Yên Bái">Yên Bái</option>
                                                <option value="Hòa Bình">Hòa Bình</option>
                                                <option value="Thái Nguyên">Thái Nguyên</option>
                                                <option value="Lạng Sơn">Lạng Sơn</option>
                                                <option value="Quảng Ninh">Quảng Ninh</option>
                                                <option value="Bắc Giang">Bắc Giang</option>
                                                <option value="Phú Thọ">Phú Thọ</option>
                                                <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                                <option value="Bắc Ninh">Bắc Ninh</option>
                                                <option value="Hải Dương">Hải Dương</option>
                                                <option value="Hải Phòng">Hải Phòng</option>
                                                <option value="Hưng Yên">Hưng Yên</option>
                                                <option value="Thái Bình">Thái Bình</option>
                                                <option value="Hà Nam">Hà Nam</option>
                                                <option value="Nam Định">Nam Định</option>
                                                <option value="Ninh Bình">Ninh Bình</option>
                                                <option value="Thanh Hóa">Thanh Hóa</option>
                                                <option value="Nghệ An">Nghệ An</option>
                                                <option value="Hà Tĩnh">Hà Tĩnh</option>
                                                <option value="Quảng Bình">Quảng Bình</option>
                                                <option value="Quảng Trị">Quảng Trị</option>
                                                <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                <option value="Đà Nẵng">Đà Nẵng</option>
                                                <option value="Quảng Nam">Quảng Nam</option>
                                                <option value="Quảng Ngãi">Quảng Ngãi</option>
                                                <option value="Bình Định">Bình Định</option>
                                                <option value="Phú Yên">Phú Yên</option>
                                                <option value="Khánh Hòa">Khánh Hòa</option>
                                                <option value="Ninh Thuận">Ninh Thuận</option>
                                                <option value="Hậu Giang">Hậu Giang</option>
                                                <option value="Kon Tum">Kon Tum</option>
                                                <option value="Gia Lai">Gia Lai</option>
                                                <option value="Đắk Lắk">Đắk Lắk</option>
                                                <option value="Đắk Nông">Đắk Nông</option>
                                                <option value="Lâm Đồng">Lâm Đồng</option>
                                                <option value="Bình Phước">Bình Phước</option>
                                                <option value="Tây Ninh">Tây Ninh</option>
                                                <option value="Bình Dương">Bình Dương</option>
                                                <option value="Đồng Nai">Đồng Nai</option>
                                                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                                <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                                <option value="Long An">Long An</option>
                                                <option value="Tiền Giang">Tiền Giang</option>
                                                <option value="Bến Tre">Bến Tre</option>
                                                <option value="Trà Vinh">Trà Vinh</option>
                                                <option value="Vĩnh Long">Vĩnh Long</option>
                                                <option value="Đồng Tháp">Đồng Tháp</option>
                                                <option value="An Giang">An Giang</option>
                                                <option value="Kiên Giang">Kiên Giang</option>
                                                <option value="Cần Thơ">Cần Thơ</option>
                                                <option value="Điện Biên">Điện Biên</option>
                                                <option value="Sóc Trăng">Sóc Trăng</option>
                                                <option value="Bạc Liêu">Bạc Liêu</option>
                                                <option value="Cà Mau">Cà Mau</option>
                                                <option value="Bình Thuận">Bình Thuận</option>
                                            </select>
                                            <br/><span class="register_address_error error"></span>
                                        </div>

                                        <div class="form-group" style="width: 100%;text-align: center;margin:auto;float:none;">
                                            <input style="float:none;" id="submit_register_frm" type="submit" name="submit" value="Đăng Ký" />
                                        </div>


                                </form>
                            </div>
                    </div>
        </div>
    </div>
</div>

</body>
</html>