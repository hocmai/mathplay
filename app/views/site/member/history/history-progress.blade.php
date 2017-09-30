@extends('site.layout.default')

@section('title')
    {{ $title = 'Lịch sử làm bài'; }}
@stop

@section('breadcrumb')
<div class="bracum">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Trang chủ</a></li>
            <li>
                {{ renderUrl('SiteMemberController@index', Auth::user()->get()->username, ['uid' => Auth::user()->get()->id]) }}
            </li>
            <li class="active">Chương trình đã học</li>
        </ol>
    </div>
</div>
@stop

<?php $gradeList = Common::getGradeList(); ?>
<main>
    @section('content')
    <div class="member-area history">
        <div class="tabs-head">
            <div class="container">
                @include('site.member.history.tabs')
            </div> <!-- End container -->
        </div> <!-- End Tabs head -->

        <div class="container">
            <div class="main-content">
                <h1 class="page-title">Chương trình đã học</h1>
                <div class="class-history-process">
                    
                    <div class="question-log-result">
                        <!-- <h2 class="title">Học bạ</h2> -->
                        <div class="result-content">
                            @if(count($data))
                            	<table class="table table-bordered table-hover">
                                    <thead>
                                        <th>Tên bài</th>
                                        <th>Thời gian</th>
                                        <th>Số câu đã làm</th>
                                        <th>Tiến trình</th>
                                    </thead>
	                                @foreach($data as $gradeId => $chapter)
	                                	@foreach($chapter as $chapterId => $lession)
	                                		@foreach($lession as $lessionId => $history)

	                                		@endforeach
	                                	@endforeach
	                                @endforeach
                                </table>
                            @else
                                <em>Bạn chưa học chương trình nào.</em>
                            @endif
                        </div> <!-- End result-content -->
                    </div> <!-- End question-log-result -->

                </div> <!-- End class-history-log -->
            </div> <!-- End main content -->
        </div> <!-- ENd container -->
    </div> <!-- End Member area -->
    @stop
</main>