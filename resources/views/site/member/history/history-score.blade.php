@extends('site.layout.default')

@section('title')
    {!! $title = 'Bảng điểm' !!}
@stop

@section('breadcrumb')
{{-- <div class="bracum">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Trang chủ</a></li>
            <li>
                {{ renderUrl('Site\SiteMemberController@index', Auth::user()->username, ['uid' => Auth::user()->id]) }}
            </li>
            <li class="active">Lịch sử làm bài</li>
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
                <h1 class="page-title">Bảng điểm</h1>
                <div class="class-history-log">
                    <div class="dropdown clearfix">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Chọn lớp: {{ !empty($gradeList[request()->get('grade')]) ? $gradeList[request()->get('grade')] : '' }}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            @foreach($gradeList as $id => $title)
                                <li>{{ link_to_action('Site\SiteMemberController@history', $title, ['uid' => Auth::user()->id, 'grade' => $id]) }}</li>
                            @endforeach
                        </ul>
                    </div> <!-- End dropdown -->
                    
                    <div class="question-log-result">
                        <!-- <h2 class="title">Học bạ</h2> -->
                        <div class="result-content">
                            @if( request()->get('grade') )
                                    @if(count($data) && count($chapter))
                                        <?php
                                        $historyData = [];
                                        foreach ($data as $key => $value) {
                                            $historyData[$value->lession_id] = $value;
                                        }
                                        ?>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th>Tên bài</th>
                                                <th>Điểm</th>
                                                <th>Số câu đã làm</th>
                                                <th>Thời gian</th>
                                                <th>Lần cuối làm bài</th>
                                            </thead>
                                            @foreach($chapter as $key => $value)
                                                <tr>
                                                    <td colspan="5">
                                                        <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapsechapter-{{ $value->id }}" aria-expanded="{{ count($value->lession) ? 'true' : 'false' }}" aria-controls="collapsechapter-{{ $value->id }}">{{ $value->title }}</a>
                                                    </td>
                                                </tr>
                                                <tbody class="collapse in" id="collapsechapter-{{ $value->id }}">
                                                    @foreach($value->lession as $key2 => $lession)
                                                        <?php
                                                        $lessionH = null;
                                                        if(isset($historyData[$lession->id])){
                                                            $lessionH = $historyData[$lession->id];
                                                        }?>
                                                        <tr onclick="window.location.href='{{ action('Site\SiteMemberController@historyQuestion', ['uid' => Auth::user()->id, 'lession' => $lession->id]) }}'">
                                                            <td class="title">{{ $lession->title }}</td>
                                                            <td>{{ Common::getObject($lessionH, 'score') }}</td>
                                                            <td>{{ Common::getObject($lessionH, 'current_question') }}</td>
                                                            <td>{{ Common::convertTimeUsed(Common::getObject($lessionH, 'time_use'))['text'] }}</td>
                                                            <td>{{ !empty($lessionH->updated_at) ? date_format(date_create(Common::getObject($lessionH, 'updated_at')), 'd/m/Y H:i') : '' }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @else
                                    <em>Bạn chưa học chương trình {{ link_to( action('Site\SiteGradeController@show', 'lop-'.request()->get('grade')), !empty($gradeList[request()->get('grade')]) ? $gradeList[request()->get('grade')] : Lớp) }} này.</em>
                                @endif
                            @else
                                <em>Hãy chọn lớp mà bạn muốn xem.</em>
                            @endif
                        </div> <!-- End result-content -->
                    </div> <!-- End question-log-result -->

                </div> <!-- End class-history-log -->
            </div> <!-- End main content -->
        </div> <!-- ENd container -->
    </div> <!-- End Member area -->
    @stop
</main>