@extends('site.layout.lession')

@section('title')
    {{ $title = $lession['title']; }}
@stop

@section('js_header')
@parent
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

$all_types = [];
foreach (glob('app/services/questions/*.php') as $file)
{

    // get the file name of the current file without the extension
    // which is essentially the class name
    $class = basename($file, '.php');

    if (class_exists($class))
    {
        $all_types[] = $class;
    }
}
?>
@foreach ($types as $type)
    @section('js_header')
        @parent
        @if( File::exists(public_path().'/questions/'.$type.'/js/script.js') )
            {{ HTML::script('questions/'.$type.'/js/script.js') }} 
        @endif
    @stop
    @section('css_header')
        @parent
        @if( File::exists(public_path().'/questions/'.$type.'/css/style.css') )
            {{ HTML::style('questions/'.$type.'/css/style.css') }}
        @endif
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
            @if(Auth::user()->check())
                <div class="box-info">
                    <div class="text">
                        <div class="avatar">
                            <img src="{{ asset('frontend/images/avata.jpg') }}" class="img-responsive mauto" alt="">
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->get()->username }}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ action('SiteUserController@logout') }}">Thoát</a></li>
                            </ul>
                        </div>
                        <span>Xin chào</span>
                        <div class="clr"></div>
                    </div>
                </div>
            @else
                <?php $ssoLib = new HocmaiOAuth2(CLIENT_ID, CLIENT_SECRET, CLIENT_REDIRECT_URI); ?>
                <a class="dang-ky hvr-shadow hocmai-oauth-login" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng ký</a>
                <a class="dang-nhap hvr-shadow hocmai-oauth-logins" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng nhập</a>
            @endif
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

                            ?>

                            {{ CommonQuestion::renderLession($lession, $history) }}
                            
                            <!-- <button class="gui-bai closeModel"  data-toggle="modal" data-target="#myModal-true">Gửi bài</button>
                            <button class="gui-bai closeModel hdg-btom"  data-toggle="modal" data-target="#myModal-false">Gửi bài</button> -->

                            <!-- Modal -->
                            <div class="modal fade" id="myModal-true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="audio">
                                    <audio><source src="{{ asset('questions/sounds/yeah1.wav') }}" type="audio/wav"></audio>
                                    <audio><source src="{{ asset('questions/sounds/yeah2.wav') }}" type="audio/wav"></audio>
                                </div>
                                <div class="modal-dialog" role="document" data-dismiss="modal" aria-label="Close">
                                    <div class="modal-content">
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
                                <div class="audio">
                                    <audio><source src="{{ asset('questions/sounds/ngu1.wav') }}" type="audio/wav"></audio>
                                    <audio><source src="{{ asset('questions/sounds/ngu2.wav') }}" type="audio/wav"></audio>
                                </div>
                                <div class="bao-cao">
                                    <div class="btn-support">
                                        <a href="#" class="btn huong-dan-giai">Hướng dẫn giải</a>
                                        <button class="btn lam-bai-tiep" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
                                    </div>
                                    <div class="notify-group">
                                        <a href="#" class="like" data-toggle="tooltip" data-placement="top" title="Thích"></a>
                                        <a href="#" class="dis-like" data-toggle="tooltip" data-placement="top" title="Không thích"></a>
                                        <a href="#" class="bao-loi" data-toggle="tooltip" data-placement="top" title="Báo lỗi"></a>
                                    </div>

                                </div>
                                <div class="modal-dialog" role="document" data-dismiss="modal" aria-label="Close">
                                    <div class="modal-content">
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
                            <p class="total-number"><span class="current-question">{{ $current_ques }}</span>/{{ !empty($config['num_question']) ? $config['num_question'] : 20 }}</p>
                            <div class="title bg2">Thời gian làm bài</div>
                            <p class="times" data-start="0"><span class="hours">00</span>:<span class="minutes">00</span>:<span class="seconds">00</span></p>
                            <div class="title bg3">Điểm</div>
                            <p class="diem">
                                <span class="span1 your-score">{{ $current_score }}</span> <br/>
                                trên tổng số <br/>
                                <span class="span2 max-score">{{ !empty($config['max_score']) ? $config['max_score'] : 100 }}</span>
                            </p>
                        </div>
                        <div class="box-s-2">
                            <!--<button class="gui-bai closeModel"  data-toggle="modal" data-target="#myModal-true">Gửi bài</button>-->
                            <!--<button class="gui-bai closeModel hdg-btom"  data-toggle="modal" data-target="#myModal-false">Gửi bài</button>-->
                            <button class="gui-bai closeModel hd-gui-bai-bt">Gửi bài</button>
                        </div>
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
                                    <a href="/grade/1" title="">
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

            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- ENd box lam bai -->
@stop