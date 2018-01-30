@extends('site.layout.no_header')

@section('title'){{ $title = 'Danh mục chương trình '.$subject['title']; }}@stop

@section('class'){{ $class = 'list-chapter-page'; }}@stop

@section('css_header')
@parent

@stop

@section('breadcrumb')
<header class="header">
    <div class="container">
        <ol class="breadcrumb hidden-xs">
            <a href="#" class="glyphicon glyphicon-chevron-left" style="padding-right: 5px; color: #fff"></a>
            <li><a href="/">Trang chủ</a></li>
            <li>
                {{ renderUrl('SiteGradeController@show', Common::getObject($grade, 'title'), ['grade_slug' => Common::getObject($grade, 'slug')])  }}
            </li>
            <li class="active">
                {{ Common::getObject($subject, 'title') }}
            </li>
        </ol>
        @include('site.common.user-menu')
    </div>
</header>
@stop

<main>
    @section('content')
    <div class="main-content">
        <div class="container">
            {{-- <h1 class="node-title bg">{{ Common::getObject($subject, 'title') }}</h1> --}}
            <div class="row">
                <div class="col-xs-12 col-sm-10 content-left">
                    <div class="head-list">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 info">
                                <div class="avatar col-sm-4 col-xs-4 padding0">
                                    <img src="{{ Common::getUserAvatar() }}" class="img-responsive" width="160px" height="160px" alt="">
                                </div>
                                <div class="text col-sm-8 col-xs-8">
                                    <h3 class="hello">Xin chào {{ Common::getUserName() }}</h3>
                                    <div class="star">{{ Common::getAllStarOfAnUser() }} <i class="fa fa-star" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 next-lession">
                                <div class="next-box">
                                    <?php $LastLessonDo = Common::getLastLessonDo(Common::getObject($grade, 'id')); ?>
                                    @if( $LastLessonDo )
                                        <span>Con đang học {{ Common::getValueOfObject($LastLessonDo, 'chapter', 'title') }}</span>
                                        <a class="link" href="{{ action('SiteLessionController@show', ['grade_slug' => $LastLessonDo->subject->grade->slug, 'subject_slug' => $LastLessonDo->subject->slug, 'lession_slug' => $LastLessonDo->lession->slug]) }}">học tiếp</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-chapter">
                        @if($subject)
                            {{-- <h3 class="title hidden-xs">DANH MỤC CHƯƠNG TRÌNH {{ $subject->title }}</h3> --}}

                            @if( count($chapters) )
                                <?php
                                $count = count($chapters);
                                $middle = ($count % 2 == 0) ? $count/2 : ($count+1)/2;
                                ?>
                                <div class="row">
                                    <div class="col-sm-6 col-1">
                                        @for($i = 0; $i < $middle; $i++)
                                            <div class="chapter-item left">
                                                <h2 class="title-sub">
                                                    <span class="head">Chương {{ $i+1 }}</span><span class="name">{{ $chapters[$i]['title'] }}</span>
                                                </h2>
                                                <ul class="nav">
                                                    <?php $lessions = Lession::orderBy('weight', 'asc')->where('chapter_id', $chapters[$i]->id)->get(); ?>
                                                    @foreach( $lessions as $lession)
                                                        <li>
                                                            <a href="{{ action('SiteLessionController@show', ['grade_slug' => $chapters[$i]->subject->grade->slug, 'subject_slug' => $chapters[$i]->subject->slug, 'lession_slug' => $lession->slug]) }}">
                                                                {{ $lession->title }}
                                                                
                                                                <?php $starLesson = Common::getMaxStarOfAnLesson($lession->id); ?>
                                                                <span class="star-list">
                                                                    <i class="fa fa-star {{ ($starLesson >= 1) ? 'yellow-color' : '' }}"></i>
                                                                    <i class="fa fa-star {{ ($starLesson >= 2) ? 'yellow-color' : '' }}"></i>
                                                                    <i class="fa fa-star {{ ($starLesson >= 3) ? 'yellow-color' : '' }}"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div> <!-- End chuong -->
                                        @endfor
                                    </div> <!-- End col-sm-6 -->
                                    <div class="col-sm-6 col-2">
                                        @for($i = $middle; $i < $count; $i++)
                                            <div class="chapter-item right">
                                                <h2 class="title-sub">
                                                    <span class="head">Chương {{ $i+1 }}</span><span class="name">{{ $chapters[$i]['title'] }}</span>
                                                </h2>
                                                <ul class="nav">
                                                    @foreach($chapters[$i]->lession as $lession)
                                                        <li>
                                                            <a href="{{ action('SiteLessionController@show', ['grade_slug' => $chapters[$i]->subject->grade->slug, 'subject_slug' => $chapters[$i]->subject->slug, 'lession_slug' => $lession->slug]) }}">{{ $lession->title }}
                                                                
                                                                <?php $starLesson = Common::getMaxStarOfAnLesson($lession->id); ?>
                                                                <span class="star-list">
                                                                    <i class="fa fa-star {{ ($starLesson >= 1) ? 'yellow-color' : '' }}"></i>
                                                                    <i class="fa fa-star {{ ($starLesson >= 2) ? 'yellow-color' : '' }}"></i>
                                                                    <i class="fa fa-star {{ ($starLesson >= 3) ? 'yellow-color' : '' }}"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div> <!-- End chuong -->
                                        @endfor
                                    </div> <!-- End col-sm-6 -->
                                </div> <!-- End row -->
                            @else
                                <div class="alert alert-warning  alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Dữ liệu đang được cập nhật.</div>
                            @endif <!-- Check chapter exists -->

                        @else
                            <div class="alert alert-warning  alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Dữ liệu đang được cập nhật.</div>
                        @endif <!-- Check subject exists -->
                    
                    </div> <!-- End chuong-trinh -->
                </div> <!-- End content left -->

                <div class="col-xs-12 col-sm-2 sidebar-right hidden-xs">
                    <div class="top-level">
                        <div class="box-top">
                            <h2 class="title">Bảng xếp hạng học sinh lớp 1</h2>
                        </div>
                        <div class="content-rating">
                            <div class="item">
                                <span class="no">1</span>
                                <div class="person">
                                    <div class="avatar pull-left"><img src="{{ asset('frontend/images/lop-1.png') }}" width="60px" height="60px"></div>
                                    <div class="info pull-left">
                                        <span class="rate">20 <i class="fa fa-star yellow-color" aria-hidden="true"></i> <span class="grey-color">85/100</span></span>
                                        <span class="name">ANNA T.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="no">2</span>
                                <div class="person">
                                    <div class="avatar pull-left"><img src="{{ asset('frontend/images/lop-2.png') }}" width="60px" height="60px"></div>
                                    <div class="info pull-left">
                                        <span class="rate">20 <i class="fa fa-star yellow-color" aria-hidden="true"></i> <span class="grey-color">85/100</span></span>
                                        <span class="name">ANNA T.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="no">3</span>
                                <div class="person">
                                    <div class="avatar pull-left"><img src="{{ asset('frontend/images/lop-3.png') }}" width="60px" height="60px"></div>
                                    <div class="info pull-left">
                                        <span class="rate">20 <i class="fa fa-star yellow-color" aria-hidden="true"></i> <span class="grey-color">85/100</span></span>
                                        <span class="name">ANNA T.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="no">4</span>
                                <div class="person">
                                    <div class="avatar pull-left"><img src="{{ asset('frontend/images/lop-1.png') }}" width="60px" height="60px"></div>
                                    <div class="info pull-left">
                                        <span class="rate">20 <i class="fa fa-star yellow-color" aria-hidden="true"></i> <span class="grey-color">85/100</span></span>
                                        <span class="name">ANNA T.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="no">5</span>
                                <div class="person">
                                    <div class="avatar pull-left"><img src="{{ asset('frontend/images/lop-2.png') }}" width="60px" height="60px"></div>
                                    <div class="info pull-left">
                                        <span class="rate">20 <i class="fa fa-star yellow-color" aria-hidden="true"></i> <span class="grey-color">85/100</span></span>
                                        <span class="name">ANNA T.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="no">6</span>
                                <div class="person">
                                    <div class="avatar pull-left"><img src="{{ asset('frontend/images/lop-3.png') }}" width="60px" height="60px"></div>
                                    <div class="info pull-left">
                                        <span class="rate">20 <i class="fa fa-star yellow-color" aria-hidden="true"></i> <span class="grey-color">85/100</span></span>
                                        <span class="name">ANNA T.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="no">7</span>
                                <div class="person">
                                    <div class="avatar pull-left"><img src="{{ asset('frontend/images/lop-3.png') }}" width="60px" height="60px"></div>
                                    <div class="info pull-left">
                                        <span class="rate">20 <i class="fa fa-star yellow-color" aria-hidden="true"></i> <span class="grey-color">85/100</span></span>
                                        <span class="name">ANNA T.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="no">8</span>
                                <div class="person">
                                    <div class="avatar pull-left"><img src="{{ asset('frontend/images/lop-1.png') }}" width="60px" height="60px"></div>
                                    <div class="info pull-left">
                                        <span class="rate">20 <i class="fa fa-star yellow-color" aria-hidden="true"></i> <span class="grey-color">85/100</span></span>
                                        <span class="name">ANNA T.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="no">9</span>
                                <div class="person">
                                    <div class="avatar pull-left"><img src="{{ asset('frontend/images/lop-2.png') }}" width="60px" height="60px"></div>
                                    <div class="info pull-left">
                                        <span class="rate">20 <i class="fa fa-star yellow-color" aria-hidden="true"></i> <span class="grey-color">85/100</span></span>
                                        <span class="name">ANNA T.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="no">10</span>
                                <div class="person">
                                    <div class="avatar pull-left"><img src="{{ asset('frontend/images/lop-3.png') }}" width="60px" height="60px"></div>
                                    <div class="info pull-left">
                                        <span class="rate">20 <i class="fa fa-star yellow-color" aria-hidden="true"></i> <span class="grey-color">85/100</span></span>
                                        <span class="name">ANNA T.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div> <!-- End sidebar right -->
            </div> <!-- End row -->

        </div> <!-- End container -->
    </div> <!-- End main content -->
    @stop

</main>