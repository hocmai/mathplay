@extends('site.layout.lession')

@section('title')
    {{ $title = $lession['title']; }}
@stop

@section('breadcrumb')
<div class="bracum bracum-set-height">
    <div class="row m0">
        <div class="col-md-8">
            <ol class="bracum-mobile">
                <li><a href="#"><span class="glyphicon glyphicon-menu-left" style="padding-right: 15px"></span> CÁC SỐ ĐẾN 10, HÌNH VUÔNG , HÌNH TRÒN</a></li>
            </ol>
            <ol class="breadcrumb">
                <a href="#" class="glyphicon glyphicon-chevron-left" style="padding-right: 5px; color: #fff"></a>
                <li><a href="/">Trang chủ</a></li>
                <li><a href="{{ action('SiteGradeController@show', ['grade_id' => $subject->grade->id]) }}">{{ $subject->grade->title }}</a></li>
                <li class="active">Môn toán</li>
            </ol>
        </div>
        <div class="inline-block">{{ $lession->title }}</div>
        <div class="box-dang-nhap">
            <div class="box-info">
                <div class="text">
                    <div class="avatar">
                        <img src="images/avata.jpg" class="img-responsive mauto" alt=""/>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Trần Văn Bi
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="index.html">Thoát</a></li>
                        </ul>
                    </div>
                    <span>Xin chào</span>
                    <div class="clr"></div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop

@section('content')
    <div class="box-bai-lam box-bai-lam-mobile">
        <div class="container">
            <div class="row m0">
                <div class="col-sm-12 col-md-10 p0 clr">
                    <div class="box-min-height">
                        <div class="bg-box-lam-bai fullScreen rightHeight">
                            <div class="hidden-md hidden-lg thong-tin-mobile">
                                <div class="box-thong-tin-bai-lam">
                                    <div class="fl">
                                        <div class="title bg1">Câu :</div>
                                        <p class="total-number">2/3</p>
                                    </div>
                                    <div class="fl">
                                        <p class="times">00:00:15</p>
                                    </div>
                                    <div class="fl">
                                        <p class="diem">
                                            <span class="span1">10</span>  điểm
                                        </p>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                            </div>
                            <div class="start">
                                Hãy chọn nhóm nào nhiều hơn
                            </div>
                            <div class="hinhs">
                                <div class="hinh">
                                    A <img src="images/te-giac.png" class="img-responsive mauto" alt=""/>
                                </div>
                                <div class="clr"></div>
                                <div class="hinh dap-an">
                                    B <img src="images/su-tu.png" class="img-responsive mauto" alt=""/>
                                </div>
                            </div>
                            <div class="chon-dap-an">
                                <div class="bao-cao">
                                    <div class="btn-support">
                                        <a href="huong-dan-giai.html" class="btn huong-dan-giai">Hướng dẫn giải</a>
                                        <button class="btn lam-bai-tiep">Làm bài tiếp</button>
                                    </div>
                                    <div class="notify-group">
                                        <a href="#" class="like" data-toggle="tooltip" data-placement="top" title="Thích"></a>
                                        <a href="#" class="dis-like" data-toggle="tooltip" data-placement="top" title="Không thích"></a>
                                        <a href="#" class="bao-loi" data-toggle="tooltip" data-placement="top" title="Báo lỗi"></a>
                                    </div>

                                </div>
                                <div class="radios">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" value="option1" class=""> <!--Neu huong dan gui bai thi them class 'hd-gui-bai-bt'-->
                                            A
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" value="option2" class=""> <!--Neu huong dan gui bai thi them class 'hd-gui-bai-bt'-->
                                            B
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <button class="gui-bai closeModel"  data-toggle="modal" data-target="#myModal-true">Gửi bài</button>
                            <!-- <button class="gui-bai closeModel hdg-btom"  data-toggle="modal" data-target="#myModal-false">Gửi bài</button> -->

                            <!-- Modal -->
                            <div class="modal fade" id="myModal-true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="box-qua-chuan-luon">
                                            <div>
                                                QUÁ CHUẨN LUÔN!
                                                <img src="images/cuoi.png" class="img-responsive mauto" alt=""/>
                                            </div>

                                        </div>
                                        <div class="text">Em đã trả lời đúng</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal-false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="box-qua-chuan-luon">
                                            <div>
                                                CỐ GẮNG LÊN NHÉ!
                                                <img src="images/meu.png" class="img-responsive mauto" alt=""/>
                                            </div>

                                        </div>
                                        <div class="text">Câu trả lời của Bạn chưa chính xác đáp án đúng là ...</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2 hidden-xs hidden-sm p0 boxRight">

                    <div class="box-thong-tin-bai-lam fullScreen leftHeight">
                        <div class="box-s-1">
                            <div class="title bg1">Câu hỏi số</div>
                            <p class="total-number">2/3</p>
                            <div class="title bg2">Thời gian làm bài</div>
                            <p class="times">00:00:15</p>
                            <div class="title bg3">Điểm</div>
                            <p class="diem">
                                <span class="span1">10</span> <br/>
                                trên tổng số <br/>
                                <span class="span2">100</span>
                            </p>
                        </div>
                        <div class="box-s-2">
                            <!--<button class="gui-bai closeModel"  data-toggle="modal" data-target="#myModal-true">Gửi bài</button>-->
                            <!--<button class="gui-bai closeModel hdg-btom"  data-toggle="modal" data-target="#myModal-false">Gửi bài</button>-->
                            <button class="gui-bai closeModel hd-gui-bai-bt">Gửi bài</button>
                            <div class="hd-gui-bai">
                                <div class="cu-meo">
                                    <img src="images/cu-meo.png" class="img-responsive mauto" alt=""/>
                                </div>
                                <div class="des">
                                    <p>
                                        Sau khi lựa chọn đáp án, bạn hãy ấn nút gửi bài nhé
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="over"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop