@extends('site.layout.default')

@section('title')
    {{ $title = 'Lịch sử làm bài'; }}
@stop

@section('breadcrumb')
{{-- <div class="bracum">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Trang chủ</a></li>
            <li>
                {{ renderUrl('SiteMemberController@index', Auth::user()->get()->username, ['uid' => Auth::user()->get()->id]) }}
            </li>
            <li class="active">Chương trình đã học</li>
        </ol>
    </div>
</div> --}}
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
                <div class="class-history-progress">
                    
                    <div class="question-log-result">
                        <!-- <h2 class="title">Học bạ</h2> -->
                        <div class="result-content">
                            @if(count($data))
                            	<div class="tb-row tb-head">
                            		<div class="tb-col col-title">Tên bài</div>
                            		<div class="tb-col col-time">Thời gian</div>
                            		<div class="tb-col col-number text-center">Số câu đã làm</div>
                            		<div class="tb-col col-progress">Số điểm</div>
                            	</div>
                                @foreach($data as $gradeId => $grade)
                                	<div class="tb-row">
	                            		<a class="collapse-head grade" role="button" data-toggle="collapse" href="#collapseGrade-{{ $gradeId }}" aria-expanded="true" aria-controls="collapseGrade-{{ $gradeId }}">{{ $grade['title'] }}</a>
	                            	</div>
	                                <div class="collapse in" id="collapseGrade-{{ $gradeId }}">
	                                	@foreach($grade['chapters'] as $chapterId => $chapter)
		                                	<div class="tb-row">
			                            		<a class="collapse-head chapter" role="button" data-toggle="collapse" href="#collapseChapter-{{ $chapterId }}" aria-expanded="true" aria-controls="collapseChapter-{{ $chapterId }}">{{ $chapter['title'] }}</a>
			                            	</div>
			                                <div class="collapse in" id="collapseChapter-{{ $chapterId }}"><tr>
		                                		@foreach($chapter['lessions'] as $lessionId => $history)
		                                			<a class="tb-row tb-body" href="{{ action('SiteMemberController@historyQuestion', ['uid' => Auth::user()->get()->id, 'lession' => Common::getObject($history, 'lession_id')]) }}">
					                            		<div class="tb-col col-title">{{ Common::getObject($history, 'lession_title') }}</div>
					                            		<div class="tb-col col-time">{{ !empty($history->time_use) ? Common::convertTimeUsed($history->time_use)['text'] : '' }}</div>
					                            		<div class="tb-col col-number text-center">{{ Common::getObject($history, 'current_question') }}</div>
					                            		<div class="tb-col col-progress">
					                            			<span class="score-start">0</span>
					                            			<div class="bar">
					                            				<div class="progress" style="width: {{ $history->score }}%"><span class="score">{{ $history->score }}</span></div>
					                            			</div>
					                            		</div>
					                            	</a>
		                                		@endforeach
	                                		</div>
	                                	@endforeach
                                	</div>
                                @endforeach
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