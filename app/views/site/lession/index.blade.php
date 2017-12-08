@extends('site.layout.lession')

@section('title')
    {{ $title = $lession['title']; }}
@stop

@section('css_header')
@parent
{{ HTML::script('frontend/js/soundmanager2-jsmin.js') }}
<script type="text/javascript">
    audioList = [];
    function checkIdExist(id){
        for(var i = 0; i < audioList.length ; i++){
            if( audioList[i].id == id ){
                return true;
            }
        }
        return false;
    }
</script>
@stop

@section('js_header')
@parent
{{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.2/MathJax.js?config=TeX-AMS_HTML')}}
{{ HTML::script('frontend/js/question_script.js') }}
@stop

<?php $config = CommonConfig::get($lession->config); ?>

<!-- Get style and script for each question type -->
<?php
$types = [];
foreach($lession->question as $question){
    if(!in_array($question->type, $types)){
        $types[] = $question->type;
    }
}
?>
@foreach ($types as $type)
    @section('js_header')
        @parent
        @foreach( glob(public_path().'/questions/'.$type.'/js/*.js') as $file)
            {{ HTML::script( asset('/questions/'.$type.'/js/'.basename($file)) ) }} 
        @endforeach
    @stop
    @section('css_header')
        @parent
        @foreach( glob(public_path().'/questions/'.$type.'/css/*.css') as $file)
            {{ HTML::style( asset('/questions/'.$type.'/css/'.basename($file)) ) }} 
        @endforeach
    @stop
@endforeach

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
                <li>
                    {{ link_to_action('SiteGradeController@show', Common::getObject($grade, 'title'), ['grade_slug' => Common::getObject($grade, 'slug')])  }}
                </li>
                <li class="active">
                    {{ link_to_action('SiteSubjectController@show', Common::getObject($subject, 'title'), ['grade_slug' => Common::getObject($grade, 'slug'), 'subject_slug' => Common::getObject($subject, 'slug')])  }}
                </li>
            </ol>
        </div>
        <div class="inline-block">{{ $lession['title'] }}</div>
        <div class="box-dang-nhap">
            @include('site.common.user-menu')
        </div>
    </div>
</div>
@stop

@section('content')
    <div class="box-bai-lam box-bai-lam-mobile">
        <div class="container">
            <div class="row m0">
                <div class="col-sm-12 col-md-10 p0 clr boxLeft">
                    <div class="box-min-height">
                        <div class="bg-box-lam-bai fullScreen rightHeight">

                            <?php
                            $history = Common::getLessionHistory($lession);
                            $current_ques = (!empty($history) && $history->status != 1 && !empty($history->current_question) ) ? $history->current_question : 1;
                            $current_score = (!empty($history) && $history->status != 1 && !empty($history->score) ) ? $history->score : 0;
                            $timeUsed = !empty($history->time_use) ? $history->time_use : 0;
                            $convertTime = Common::convertTimeUsed($timeUsed);
                            ?>

                            {{ CommonQuestion::renderLession($lession, $history) }}

                            <!-- Modal -->
                            <div class="modal fade" id="myModal-true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <!-- <div class="audio">
                                    <audio><source src="" type="audio/wav"></audio>
                                </div> -->
                                <div class="modal-dialog" role="document" data-dismiss="modal" aria-label="Close">
                                    <div class="modal-content col-sm-pull-2">
                                        <div class="box-qua-chuan-luon">
                                            <div>
                                                <span><?php
                                                $strings = ['QUÁ CHUẨN LUÔN!', 'BẠN THẬT TUYỆT VỜI!', 'XUẤT SẮC!', 'QUÁ ĐỈNH!', 'THẬT VI DIỆU!'];
                                                echo $strings[array_rand($strings)];
                                                ?></span>
                                                <img src="{{ asset('frontend/images/cuoi.png') }}" class="img-responsive mauto" alt=""/>
                                            </div>

                                        </div>
                                        <div class="text">Em đã trả lời đúng</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal-false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <!-- <div class="audio">
                                    <audio><source src="" type="audio/wav"></audio>
                                </div> -->
                                <div class="bao-cao">
                                    <div class="container">
                                        <div class="row">
                                            <div class="btn-support col-sm-10">
                                                <a href="#" class="btn huong-dan-giai">Hướng dẫn giải</a>
                                                <button class="btn lam-bai-tiep" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
                                            </div>
                                            {{-- <div class="notify-group">
                                                <a href="#" class="like" data-toggle="tooltip" data-placement="top" title="Thích"></a>
                                                <a href="#" class="dis-like" data-toggle="tooltip" data-placement="top" title="Không thích"></a>
                                                <a href="#" class="bao-loi" data-toggle="tooltip" data-placement="top" title="Báo lỗi"></a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-dialog" role="document" data-dismiss="modal" aria-label="Close">
                                    <div class="modal-content col-sm-pull-2">
                                        <div class="box-qua-chuan-luon">
                                            <div>KHÔNG ĐÚNG RỒI!<br/>
                                                CỐ GẮNG LÊN NHÉ!
                                                <img src="{{ asset('frontend/images/meu.png') }}" class="img-responsive mauto" alt=""/>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End bai lam -->
                        
                    </div>
                </div> <!-- End left -->

                <div class="col-sm-12 col-md-2 hidden-xs hidden-sm p0 boxRight">
                    <div class="box-thong-tin-bai-lam fullScreen leftHeight">
                        <div class="box-s-1">
                            <div class="title bg1">Câu hỏi số</div>
                            <p class="total-number"><span class="current-question">{{ $current_ques }}</span>/{{ !empty($config['number_ques']) ? $config['number_ques'] : 20 }}</p>
                            <div class="title bg2">Thời gian làm bài</div>
                            <p class="times" data-start="0">
                                <span class="time-use hidden">{{$timeUsed}}</span>
                                <span class="hours">{{ (($convertTime['hours'] < 10) ? '0' : '').$convertTime['hours'] }}</span>:<span class="minutes">{{ (($convertTime['minutes'] < 10) ? '0' : '').$convertTime['minutes'] }}</span>:<span class="seconds">{{ (($convertTime['seconds'] < 10) ? '0' : '').$convertTime['seconds'] }}</span>
                            </p>
                            <div class="title bg3">Điểm</div>
                            <p class="diem">
                                <span class="span1 your-score">{{ $current_score }}</span>/<span class="span2 max-score">{{ !empty($config['max_score']) ? $config['max_score'] : 100 }}</span>
                            </p>
                        </div>
                        <div class="box-s-2">
                            <button class="gui-bai closeModel hd-gui-bai-bt">Gửi bài</button>
                        </div>
                        <div class="hd-gui-bai">
                            <div class="cu-meo">
                                <img src="{{ asset('frontend/images/cu-meo.png') }}" class="img-responsive mauto" alt=""/>
                            </div>
                            <div class="des">
                                <p>
                                    Sau khi lựa chọn đáp án, bạn hãy ấn nút gửi bài nhé
                                </p>
                            </div>
                        </div>
                        <div class="over"></div>
                    </div>
                </div>

                <div class="hoan-thanh fullScreen2 hidden" style="display: none;">
                    <div class="porel">
                        <div class="img">
                            <img src="{{ asset('frontend/images/sao-xuat-sac.png') }}" class="img-responsive mauto" alt=""/>
                        </div>
                        <div class="point">100 điểm</div>
                        <div class="text-end">
                            Bạn thật xuất sắc
                        </div>
                        <div class="button-uls">
                            <ul class="inline button-ul">
                                <li>
                                    <a href="{{ action('SiteSubjectController@show', ['grade_slug' => Common::getObject($grade, 'slug'), 'subject_slug' => Common::getObject($subject, 'slug')]) }}" title="">
                                        <img src="{{ asset('frontend/images/list-bai-hoc.png') }}" class="img-responsive mauto" alt=""/>
                                        <div class="text">Danh mục bài học</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="" title="">
                                        <img src="{{ asset('frontend/images/quay-lai.png') }}" class="img-responsive mauto" alt=""/>
                                        <div class="text">Quay lại</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="" title="">
                                        <img src="{{ asset('frontend/images/next-bai.png') }}" class="img-responsive mauto" alt=""/>
                                        <div class="text">Bài học tiếp theo</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- End box hoan thanh -->

                <div class="ban-phim clicked">
                    <div class="text-show">
                        Hiển thị bàn phím <i class='fa fa-angle-double-up'></i>
                    </div>
                    <div class="col-type">
                        <div class="inline-block col-number">
                            <div class="col-float-left items-number">
                                <div class="item-number" data-number = "1" >1</div>
                                <div class="item-number" data-number = "2" >2</div>
                                <div class="item-number" data-number = "3" >3</div>
                                <div class="item-number" data-number = "4" >4</div>
                                <div class="item-number" data-number = "5" >5</div>
                            </div>
                            <div class="col-float-left items-number">
                                <div class="item-number" data-number = "6" >6</div>
                                <div class="item-number" data-number = "7" >7</div>
                                <div class="item-number" data-number = "8" >8</div>
                                <div class="item-number" data-number = "9" >9</div>
                                <div class="item-number" data-number = "0" >0</div>
                            </div>
                        </div>
                        <div class="inline-block col-unikey">
                            <div class="col-float-left items-number xanh-main-2">
                                <div class="item-number" data-number = "+">+</div>
                                <div class="item-number" data-number = "-">-</div>
                                <div class="item-number" data-number = "x">x</div>
                                <div class="item-number" data-number = ":">:</div>
                                <div class="delete" data-number = "delete" >Xóa</div>
                            </div>
                            <div class="col-float-left items-number xanh-main">
                                <div class="item-number" data-number = ">" >></div>
                                <div class="item-number" data-number = "<" ><</div>
                                <div class="item-number" data-number = "=" >=</div>
                                <div class="item-number" data-number = "," >,</div>
                                <a class="gui-bai" href="">Gửi bài</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- End ban phim ao -->

            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- ENd box lam bai -->
@stop