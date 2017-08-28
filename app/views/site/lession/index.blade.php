@extends('site.layout.lession')

@section('title')
    {{ $title = $lession['title']; }}
@stop

@section('js_header')
@parent
{{ HTML::script('frontend/js/question_script.js')}}
@stop

<?php $config = (array)json_decode($lession->config); ?>

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
                <li><a href="{{ action('SiteGradeController@show', ['grade_id' => Common::getValueOfObject($subject, 'grade', 'id')]) }}">{{ Common::getValueOfObject($subject, 'grade', 'title') }}</a></li>
                <li class="active">Môn toán</li>
            </ol>
        </div>
        <div class="inline-block">{{ $lession['title'] }}</div>
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

                            {{ CommonQuestion::renderLession($lession) }}
                            
                            <!-- <button class="gui-bai closeModel"  data-toggle="modal" data-target="#myModal-true">Gửi bài</button>
                            <button class="gui-bai closeModel hdg-btom"  data-toggle="modal" data-target="#myModal-false">Gửi bài</button> -->

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
                            <p class="total-number"><span class="current-question">1</span>/{{ !empty($config['num_question']) ? $config['num_question'] : 20 }}</p>
                            <div class="title bg2">Thời gian làm bài</div>
                            <p class="times">00:00:15</p>
                            <div class="title bg3">Điểm</div>
                            <p class="diem">
                                <span class="span1">10</span> <br/>
                                trên tổng số <br/>
                                <span class="span2">{{ !empty($config['score_limit']) ? $config['score_limit'] : 100 }}</span>
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