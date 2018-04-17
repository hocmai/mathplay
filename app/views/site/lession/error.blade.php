@extends('site.layout.default')
@section('class'){{ $class = 'lession-page'; }}@stop
@section('content')
    <div class="box-bai-lam lession-wrapper">
        <div class="container">
           {{--  <h1 class="node-title bg">{{ Common::getValueOfObject($lession, 'chapter', 'title') }}</h1> --}}
            <div class="row margin0">
                <div class="col-xs-12 col-sm-8 padding0 boxLeft">
                    <div class="bg-box-lam-bai lession-content">
                        @if($logged)
                            <div class="notification">
                                <div class="text-error" >
                                    <p class="item-text">Bạn phải đăng ký khóa học mới được làm tiếp chương này!</p>
                                </div>
                                <p class="img_err"><img src="{{ asset('/errors/images/owl_night.png') }}" /></p>
                            </div>
                        @else
                            <div class="notification">
                                <div class="text-error">
                                    <p class="item-text">Bạn phải là thành viên, mới được làm bài!</p>
                                </div>
                                <p class="img_err"><img src="{{ asset('/errors/images/owl_night.png') }}" /></p>
                                <?php $ssoLib = new HocmaiOAuth2(CLIENT_ID, CLIENT_SECRET, CLIENT_REDIRECT_URI);?>
                                <a href="{{ $ssoLib->getAuthorizeUri() }}" class="dang-ky button hocmai-oauth-login"> Đăng ký thành viên mới tại đây!</a>
                            </div>
                        @endif
                    </div>
                </div> <!-- End left -->
                <div class="col-xs-12 col-sm-4 boxRight">
                    <div class="lession-process hidden-xs">
                        <div class="progress">
                            <div class="active progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0">
                            </div>
                            <span class="star-point star-1"><i class="fa fa-star" aria-hidden="true"></i></span>
                            <span class="star-point star-2"><i class="fa fa-star" aria-hidden="true"></i></span>
                            <span class="star-point star-3"><i class="fa fa-star" aria-hidden="true"></i></span>
                        </div>
                        <p class="diem">
                            <span class="span1 your-score">0</span>/<span class="span2 max-score">100đ</span>
                        </p>
                    </div>
                    <div class="lession-keyboard hidden-xs">
                        <div class="col1 item item-number white-bg" data-number = "1" >1</div>
                        <div class="col1 item item-number white-bg" data-number = "2" >2</div>
                        <div class="col1 item item-number white-bg" data-number = "3" >3</div>
                        <div class="col1 item item-number blue-bg" data-number = "+">+</div>
                        <div class="col1 item item-number blue-bg" data-number = "-">-</div>
                        <div class="col1 item item-number white-bg" data-number = "4" >4</div>
                        <div class="col1 item item-number white-bg" data-number = "5" >5</div>
                        <div class="col1 item item-number white-bg" data-number = "6" >6</div>
                        <div class="col1 item item-number blue-bg" data-number = "x">x</div>
                        <div class="col1 item item-number blue-bg" data-number = ":">:</div>
                        <div class="col1 item item-number white-bg" data-number = "7" >7</div>
                        <div class="col1 item item-number white-bg" data-number = "8" >8</div>
                        <div class="col1 item item-number white-bg" data-number = "9" >9</div>
                        <div class="col1 item item-number blue-bg" data-number = ">" >></div>
                        <div class="col1 item item-number blue-bg" data-number = "<" ><</div>
                        <div class="col1 item item-number white-bg" data-number = "0" >0</div>
                        <div class="item delete col-2 red-bg" data-number = "delete" >Xóa</div>
                        <div class="col1 item item-number blue-bg" data-number = "=" >=</div>
                        <div class="col1 item item-number blue-bg" data-number = "," >,</div>

                        <div class="clear clearfix"></div>
                        <a class="gui-bai yellow-bg" href="#">Gửi bài</a>
                    </div>
                </div>

            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- ENd box lam bai -->
@stop
