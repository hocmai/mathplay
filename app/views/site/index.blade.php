@extends('site.layout.default')

@section('title')
    {{ $title = trans('captions.home'); }}
@stop

@section('js_header')
    @parent
    {{ HTML::script('frontend/js/jssor.js')}}
    {{ HTML::script('frontend/js/jssor.slider.js')}}
@stop

@section('css_header')
    @parent
    {{ HTML::style('frontend/css/jssor.css')}}
@stop

@section('slide')
    @parent
    <div class="slider">
        <div id="slider1_container" class="fadeIn wow" style="position: relative; width: 1600px; height: 600px; overflow: hidden;">

            <!-- Loading Screen -->
            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;

                background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;">
                </div>
                <div style="position: absolute; display: block; background: url({{ asset('frontend/images/ajax-loader.gif') }} no-repeat center center;

                top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
            </div>

            <!-- Slides Container -->
            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1600px; height: 600px;
            overflow: hidden;">
                <div>
                    <img u="image" src="{{ asset('frontend/images/slider-1.jpg') }}" />


                    <div u="caption" t="ZMF|10" t2="B" d=1000 style="
                        left: 650px;
                        top: 90px;
                        width: 560px;
                        height: 120px;
                        font-size: 46px;
                        color: rgb(255, 255, 255);
                        transform: rotate(0deg) scale(1);
                        font-weight: 600;
                        font-family: comic;
                        text-transform: uppercase;
                        line-height: 1.2;
                        position: absolute;
            ">HỌC SIÊU VUI
                        <br/> - TRAU DỒI KIẾN THỨC
                    </div>

                    <div u="caption" t="T|IB" t2="R" d=500  style="
                position: absolute;
                bottom: -20px;
                left: 250px;
                width: 401px;
                height: 518px;
                line-height: 90px;
            ">
                        <img src="{{ asset('frontend/images/hs-slider.png') }}" class="img-responsive" alt=""/>
                    </div>
                </div>
                <div>
                    <img u="image" src="{{ asset('frontend/images/slider-2.png') }}" />
                    <div u="caption" t="ZMF|10" t2="B" d=1000 style="
                        left: 320px;
                        top: 200px;
                        width: 560px;
                        height: 120px;
                        font-size: 28px;
                        color: #333;
                        transform: rotate(0deg) scale(1);
                        font-weight: 600;
                        font-family: comic;
                        text-transform: uppercase;
                        line-height: 1.2;
                        position: absolute;
                        z-index: 99;
            ">HỌC SIÊU VUI
                        <br/> - TRAU DỒI KIẾN THỨC
                    </div>

                    <div u="caption" t="T|IB" d=-100 style="
                position: absolute;
                left: 235px;
                top: 85px;
                width: 450px;
                height: 301px;
                font-size: 28px;
                color: rgb(255, 255, 255);
                line-height: 30px;
                ">
                        <img src="{{ asset('frontend/images/slider-2-1.png') }}" class="img-responsive" alt=""/></div>
                    <div u="caption" t="T|IB" t2="R" d=500  style="
                position: absolute;
                bottom: -20px;
                left: 750px;
                width: 506px;
                height: 569px;
                line-height: 90px;
            ">
                        <img src="{{ asset('frontend/images/hs-slider-2.png') }}" class="img-responsive" alt=""/>
                    </div>
                </div>


            </div>


            <div u="navigator" class="jssorb03" style="bottom: 16px; right: 6px;">
                <!-- bullet navigator item prototype -->
                <div u="prototype"></div>
            </div>
            <!-- Arrow Left -->
            <span u="arrowleft" class="jssora20l" style="top: 123px; left: 8px;">
            </span>
                <!-- Arrow Right -->
                <span u="arrowright" class="jssora20r" style="top: 123px; right: 8px;">
            </span>

        </div>
    </div>
@stop

@section('content_front')
    <div class="box-video">
        <div class="container">
            <div class="row m20">
                <div class="col-sm-12 col-md-7 p20">
                    <div class="videos">
                        <div class="title"><span class="span1"></span> Video Giới thiệu <span class="span2"></span></div>
                        <div class="video">
                            <div class="button-play" id="play-button"></div>
                            <div class="button-stop" id="pause-button"></div>
                            <div class="button-volum-t" id="button-volum-t"></div>
                            <div class="button-volum-g" id="button-volum-g"></div>
                            <iframe id="video" width="100%" src="https://www.youtube.com/embed/Z54nyhtXvAQ?enablejsapi=1" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <script type="text/javascript">
                            var tag = document.createElement('script');
                            tag.id = 'iframe-demo';
                            tag.src = 'https://www.youtube.com/iframe_api';
                            var firstScriptTag = document.getElementsByTagName('script')[0];
                            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                            var player;
                            function onYouTubeIframeAPIReady() {
                                player = new YT.Player('video', {
                                    events: {
                                        'onReady': onPlayerReady
                                    }
                                });
                            }
                            function onPlayerReady(event) {
                                var playButton = document.getElementById("play-button");
                                playButton.addEventListener("click", function() {
                                    player.playVideo();
                                });
                                var pauseButton = document.getElementById("pause-button");
                                pauseButton.addEventListener("click", function() {
                                    player.pauseVideo();
                                });

                                event.target.setVolume(50);
                                var count = 50;
                                var buttonT = document.getElementById("button-volum-t");
                                buttonT.addEventListener("click", function() {
                                    count = count + 10;
                                    if(count > 100){
                                        count = 100
                                    }
                                    event.target.setVolume(count);
                                });

                                var buttonG = document.getElementById("button-volum-g");
                                buttonG.addEventListener("click", function() {
                                    count = count - 10;
                                    if(count < 0){
                                        count = 0
                                    }
                                    event.target.setVolume(count);
                                });
                            }
                        </script>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 hidden-sm hidden-xs p20">
                    <div class="forms">
                        <div class="title">
                            Đăng nhập / Đăng ký
                        </div>
                        <div class="form">
                            <form action="dang-nhap.html">
                                <div class="form-group">
                                    <input type="text" class="form-control"  placeholder="Tên đăng nhập">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Mật khẩu">
                                </div>
                                <button type="submit" class="btn btn-default">Đăng nhập</button>
                            </form>
                            <p>Nếu chưa có tài khoản, mời bạn <a href="dang-ky.html" title="">Đăng Ký</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-intro">
            <div class="container">
                <div class="row">
                    <div class="multiple">
                        <div class="col-md-4">
                            <div class="des">
                                Giao diện đẹp mắt, dễ dùng và logic, bài học được bố trí theo mục lục sách giáo khoa nên học sinh dễ dàng tìm được bài mình muốn ôn, học. Con có thể học bất cứ lúc nào, ở đâu, trên bất cứ thiết bị nào.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="des">
                                Với cách tương tác mới, các con sẽ biết ngay được kết quả sau mỗi câu và xem đáp án, hướng dẫn giải chi tiết để từ đó hiểu ra vấn đề. Cách học này chắn chắn sẽ khiến con cảm thấy việc học TOÁN KHÔNG KHÓ và RẤT THÚ VỊ.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="des">
                                Ngoài việc học, chương trình đố vui TOÁN HỌC có thưởng và thi đấu giúp các con thêm hứng thú thi đua. Việc kết bạn mới để trao đổi cũng giúp con tiến bộ trong học tập
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="box-chon-lop">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title">Chọn lớp học phù hợp</div>
                        <div class="sao"></div>
                    </div>
                </div>
                <div class="row max-width">
                    <div class="col-sm-4">
                        <div class="box-lop">
                            <div class="avatar">
                                <a href="" class="hvr-float-shadow" title=""><img src="{{ asset('frontend/images/lop-1.png') }}" class="img-responsive mauto" alt=""/></a>
                            </div>
                            <div class="text">
                                <a href="" title="">Lớp 1</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box-lop">
                            <div class="avatar">
                                <a href="" class="hvr-float-shadow" title=""><img src="{{ asset('frontend/images/lop-2.png') }}" class="img-responsive mauto" alt=""/></a>
                            </div>
                            <div class="text">
                                <a href="" title="">Lớp 2</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box-lop">
                            <div class="avatar">
                                <a href="" class="hvr-float-shadow" title=""><img src="{{ asset('frontend/images/lop-3.png') }}" class="img-responsive mauto" alt=""/></a>
                            </div>
                            <div class="text">
                                <a href="" title="">Lớp 3</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-note-big">

            <div class="box-note">
                <div class="container">
                    <div class="row max-width m0">
                        <div class="col-sm-12 p0">
                            <div class="des">
                                Nếu thuê gia sư, mỗi tháng trung bình bạn sẽ phải trả từ 560.000 đồng đến 1.400.000 đồng/tháng (mỗi tuần 2 buổi – tùy vào chất lượng gia sư) và một năm nếu trừ 3 tháng nghỉ hè bạn sẽ cần 5.040.000 đồng đến 12.600.000 đồng /năm
                                Với việc học thêm chi phí tối thiểu mỗi tháng cũng từ vài trăm nghìn đồng trở lên.
                                <br/>
                                <br/>
                                Còn với thẻ VIP Luyện Thi 123 con của bạn có thể học cả năm (365 ngày) tất cả các chương trình, nội dung có trên website sẽ có giá bao nhiêu?
                                <br/>
                                Với mong muốn mọi học sinh đều có thể tiếp cận và được sử dụng LUYỆN THI 123, nhân dịp ra mắt thẻ VIP chỉ có giá: 150.000 đồng/năm (Tức là chỉ khoảng 400 đồng/ngày) là con bạn truy cập và học được toàn bộ nội dung trên website với toàn bộ các chương trình ôn tập, bài tập luyện tập toán lớp 1,2,3,4,5. Quá rẻ phải không nào?
                                <br/>
                                Bạn đã sẵn sàng tặng nó cho con yêu chưa?
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="khinh-khi-cau">-->
                    <!--<img src="{{ asset('frontend/images/khinh-khi-cau.png') }}" class="img-responsive" alt=""/>-->
                <!--</div>-->
            </div>
        </div>
    </div>
@stop