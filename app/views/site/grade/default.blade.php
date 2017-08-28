@extends('site.layout.default')

@section('title')
    {{ $title = 'Danh mục chương trình '.$data['title']; }}
@stop

@section('breadcrumb')
<div class="bracum">
    <div class="container">
        <ol class="bracum-mobile">
            <li><a href="/">Trang chủ</a></li>
            <li><a href="{{ action('SiteGradeController@show', ['grade_id' => $data['id']]) }}">{{ $data['title'] }}</a></li>
        </ol>
        <ol class="breadcrumb">
            <li><a href="/">Trang chủ</a></li>
            <li><a href="{{ action('SiteGradeController@show', ['grade_id' => $data['id']]) }}">{{ $data['title'] }}</a></li>
        </ol>
    </div>
</div>
@stop

<main>
    @section('content')
    <div class="box-chuong-trinh">
        <div class="box-gradient">
            <div class="container">
                    <div class="bg-ff">
                        <div class="row">
                            <div class="col-md-12 col-lg-8 content-left">
                                <!-- <div class="banner hidden-xs">
                                    <a href="#" title="">
                                        <img src="images/banner.jpg" class="img-responsive mauto" alt=""/>
                                    </a>
                                </div> -->
                                <div class="chuong-trinh">
                                    <h3 class="title hidden-xs">DANH MỤC CHƯƠNG TRÌNH TOÁN LỚP 1</h3>
                                    <div class="row">
                                        <div class="col-sm-6 col-1">
                                            @for($i = 0; $i <= floor(count($chapters)/2); $i++)
                                                <div class="chuong">
                                                    <h4 class="title-sub">
                                                        {{ 'Chương '.($i+1).': '.$chapters[$i]['title'] }}
                                                        <i class="fa fa-angle-down"></i>
                                                    </h4>
                                                    <ul>
                                                        @foreach($chapters[$i]->lession as $lession)
                                                            <li><a href="{{ action('SiteLessionController@show', ['subject_id' => $chapters[$i]->subject->slug, 'lession_id' => $lession->slug]) }}">{{ $lession->title }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div> <!-- End chuong -->
                                            @endfor
                                        </div> <!-- End col-sm-6 -->
                                        <div class="col-sm-6 col-2">
                                            @for($i = round(count($chapters)/2); $i < count($chapters); $i++)
                                                <div class="chuong">
                                                    <h4 class="title-sub">
                                                        {{ 'Chương '.($i+1).': '.$chapters[$i]['title'] }}
                                                        <i class="fa fa-angle-down"></i>
                                                    </h4>
                                                    <ul>
                                                        @foreach($chapters[$i]->lession as $lession)
                                                            <li><a href="">{{ $lession->title }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div> <!-- End chuong -->
                                            @endfor
                                        </div> <!-- End col-sm-6 -->
                                    </div> <!-- End row -->
                                </div> <!-- End chuong-trinh -->
                            </div> <!-- End content left -->

                            <div class="col-md-12 col-lg-4 hidden-md hidden-sm hidden-xs sidebar-right">
                                <div class="boxs-right">
                                    <div class="box-right bg-tinh-nang">
                                        <h2 class="title">Xếp hạng học sinh lớp 1</h2>
                                        <div class="tinh-nang-xay-dung">
                                            <img src="images/tinh-nang-dang-xay-dung.png" class="img-responsive mauto" alt=""/>
                                        </div>
                                    </div>
                                    <div class="box-right bg-tin-tuc">
                                        <h2 class="title">Tin mới HOCMAI</h2>
                                        <div class="news">
                                            <div class="new">
                                                <a class="img hvr-float-shadow" href="#" title="">
                                                    <img src="images/ca-sau.png" class="img-responsive" alt=""/>
                                                </a>
                                                <a class="text" href="#" title="">Lorem ispum dolor sit
                                                    amet ltorem ispum dolor
                                                    sit amet....</a>
                                                <a class="xemthem" href="#" title="">Xem thêm</a>
                                            </div>
                                            <div class="new">
                                                <a class="img hvr-float-shadow" href="#" title="">
                                                    <img src="images/ngua.png" class="img-responsive" alt=""/>
                                                </a>
                                                <a class="text" href="#" title="">Lorem ispum dolor sit
                                                    amet ltorem ispum dolor
                                                    sit amet....</a>
                                                <a class="xemthem" href="#" title="">Xem thêm</a>
                                            </div>
                                            <div class="new">
                                                <a class="img hvr-float-shadow" href="#" title="">
                                                    <img src="images/khi.png" class="img-responsive" alt=""/>
                                                </a>
                                                <a class="text" href="#" title="">Lorem ispum dolor sit
                                                    amet ltorem ispum dolor
                                                    sit amet....</a>
                                                <a class="xemthem" href="#" title="">Xem thêm</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- End sidebar right -->
                        </div> <!-- End row -->
                    </div> <!-- End bg-ff -->

            </div> <!-- ENd container -->
        </div> <!-- End box gadient -->
    </div> <!-- End box chuong trinh -->
    @stop

</main>