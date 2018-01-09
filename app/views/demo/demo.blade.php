@extends('demo.layout.default_demo')

@section('title')
{{ $title = $grade->title }}
@stop

@section('breadcrumb')
<ol class="txt">
    <li><a href="#"><strong><</strong></a></li>
    <li><a href="/">Trang Chủ></a></li>
    <li><a href="{{ action('SiteDemoController@show', $grade->slug) }}">{{ $grade->title }}></a></li>
    <li>{{ $subjects->title }}</li>
</ol>
@stop

@section('content')
<div class="top-content">
    <div class="top-left col-sm-6 col-xs-12 padding0">
        <div class="avata col-sm-4 col-xs-4">
            <img src="{{ asset('/images/image_demo/icon-avata.png') }}" class="img-responsive" width="160px" height="160px" alt="">
        </div>
        <div class="text col-sm-8 col-xs-8">
            <h3 class="hello">Xin chào Kid</h3>
            <div class="star">20 <i class="fa fa-star" aria-hidden="true"></i></div>
        </div>       
    </div>
    <!-- end top-left -->
    <div class="top-right col-sm-6 col-xs-12">
        <div class="next-box">
            <span>CON ĐANG HỌC BÀI 3</span>
            <a class= "link" href="">Học Tiếp</a>
        </div>
    </div>
    <!-- end-top-right -->
</div> 
<div class="main-content">
    @if( count($chapters) )
    <div class="col-sm-6 col-1 ">
        @for( $i = 0 ; $i < floor(count($chapters)/2) ; $i++ )
            <div class="chapter">
                <h2 class="title">
                    <span class='head'>Chương {{ $i+1 }}</span><span class="name">{{ $chapters[$i]->title }}</span>
                </h2>
                @if( count($chapters[$i]->lession) )
                <ul class="list">
                     @foreach($chapters[$i]->lession as $lession )
                        <li>
                            <a href="#">{{ $lession->title }}</a>
                            <span>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                        </li>
                    @endforeach
                    
                </ul>
                @else
                    khong co lession
                @endif
            </div> <!-- end-chapter-1 -->
        @endfor
    </div>
    <!-- end col-1 -->

    <div class="col-sm-6 col-2">
        @for( $i = floor(count($chapters)/2) ; $i < count($chapters) ; $i++ )
            <div class="chapter">
                <h2 class="title">
                    <span class='head'>Chương {{ $i+1 }}</span><span class="name">{{ $chapters[$i]->title }}</span>
                </h2>
                @if( count($chapters[$i]->lession) )
                <ul class="list">
                     @foreach($chapters[$i]->lession as $lession )
                        <li>
                            <a href="#">{{ $lession->title }}</a>
                            <span>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                        </li>
                    @endforeach
                    
                </ul>
                @else
                    khong co lession
                @endif
            </div><!-- end -chapter-3 -->
        @endfor
    </div><!-- end-chapter-4 -->

    @else
    khong co du lieu
    @endif

</div>
@stop

@section('sidebar')
<div class="level">
    <div class="box-top">
        <p class="avata-top"><img src="{{ asset('/images/image_demo/content-right/content-icon-1.png') }}"></p>
        <h2 class="title1">BẢNG XẾP HẠNG HỌC SINH LỚP 1</h2>
    </div>
    <div class="item">
        <span class="box1">1</span>
        <div class="student">
            <div class="avata-student">
                <img src="{{ asset('/images/image_demo/content-right/content-icon-2.png') }}">
            </div>
            <div class="info">
                <span class="rate">20 <i class="fa fa-star" aria-hidden="true" style="color: yellow"></i> <span class="grey-color" style="color: grey">85/100</span></span>
                <span class="name1">ANNA T.</span>
            </div>
        </div>
    </div>
    <div class="item">
        <span class="box1">2</span>
        <div class="student">
            <div class="avata-student">
                <img src="{{ asset('/images/image_demo/content-right/content-icon-3.png') }}">
            </div>
            <div class="info">
                <span class="rate">20 <i class="fa fa-star" aria-hidden="true" style="color: yellow"></i> <span class="grey-color" style="color: grey">85/100</span></span>
                <span class="name1">ANNA T.</span>
            </div>
        </div>
    </div>
    <div class="item">
        <span class="box1">3</span>
        <div class="student">
            <div class="avata-student">
                <img src="{{ asset('/images/image_demo/content-right/content-icon-4.png') }}">
            </div>
            <div class="info">
                <span class="rate">20 <i class="fa fa-star" aria-hidden="true" style="color: yellow"></i> <span class="grey-color" style="color: grey">85/100</span></span>
                <span class="name1">ANNA T.</span>
            </div>
        </div>
    </div>
    <div class="item">
        <span class="box1">4</span>
        <div class="student">
            <div class="avata-student">
                <img src="{{ asset('/images/image_demo/content-right/content-icon-5.png') }}">
            </div>
            <div class="info">
                <span class="rate">20 <i class="fa fa-star" aria-hidden="true" style="color: yellow"></i> <span class="grey-color" style="color: grey">85/100</span></span>
                <span class="name1">ANNA T.</span>
            </div>
        </div>
    </div>
</div>
@stop
<!-- end-container -->
<!-- end content -->
