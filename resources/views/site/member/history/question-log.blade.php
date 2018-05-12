@extends('site.layout.default')

@section('title')
    {!! $title = 'Lịch sử làm bài' !!}
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
                <h1 class="page-title">Lịch sử làm bài</h1>
                <div class="question-log-filter">
                    {{ Form::open(['action' => ['Site\SiteMemberController@historyQuestion', Auth::user()->id], 'method' => 'GET', 'id' => 'filter-question-log-form']) }}
                        {{ Form::hidden('lession') }}
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownLesionTree" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                {{ !empty($lession) ? 'Chọn: '.$lession : 'CHỌN: Bài kiểm tra' }}
                                <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownLesionTree">
                                {!! $tree !!}
                                <div class="menu-footer">
                                    {{ Form::submit('Xem',['class' => 'btn btn-primary', 'disabled' => true]) }}
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="question-log-result">
                    <h2 class="title">Lịch sử làm bài</h2>
                    <div class="result-content alert box">
                        @if( request()->get('lession') )
                            @if(count($data))
                                <div class="panel-group" id="accordionLog" role="tablist" aria-multiselectable="true">
                                    @foreach($data as $key => $value)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingLog-{{ $value->id }}">
                                                <h4 class="panel-title">
                                                    <span>{{'Bài '.($key+1).': '.date_format(date_create($value->created_at), 'd/m/Y H:i').' - '.date_format(date_create($value->updated_at), 'H:i d/m/Y')}}</span>
                                                    <span class="score pull-right">Điểm: {{ $value->score }}</span>
                                                </h4>
                                                <a role="button" data-toggle="collapse" data-parent="#accordionLog" href="#collapseLog-{{ $value->id }}" aria-expanded="{{ ($key==0) ? 'true' : 'false' }}" aria-controls="collapseLog-{{ $value->id }}"></a>
                                            </div>
                                            <div id="collapseLog-{{ $value->id }}" class="panel-collapse collapse {{ ($key==0) ? 'in' : '' }}" role="tabpanel" aria-labelledby="headingLog-{{ $value->id }}">
                                                <div class="panel-body">
                                                    <p><strong>Lớp: </strong>{{ Common::getValueOfObject($value, 'grade', 'title') }}</p>
                                                    <p><strong>Môn: </strong>{{ Common::getValueOfObject($value, 'subject', 'title') }}</p>
                                                    <p><strong>Chuyên đề: </strong>{{ Common::getValueOfObject($value, 'chapter', 'title') }}</p>
                                                    <p><strong>Số câu đã trả lời: </strong>{{ $value->current_question }}</p>
                                                    <?php $convertTime = Common::convertTimeUsed($value->time_use); ?>
                                                    <p><strong>Thời gian làm bài: </strong>{{ ( ($convertTime['hours'] > 0) ? $convertTime['hours'].' Giờ ' : '' ).( ($convertTime['minutes'] > 0) ? $convertTime['minutes'].' Phút ' : '' ).( ($convertTime['seconds'] > 0) ? $convertTime['seconds'].' Giây ' : '' ) }}</p>
                                                    <p><strong>{{ (Common::getObject($value, 'status') == '1') ? 'Đã hoàn thành <i class="fa fa-check" aria-hidden="true"></i>' : 'Chưa hoàn thành' }}</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <em>Bạn chưa làm bài {{ link_to('/lession/'.request()->get('lession'), 'kiểm tra') }} này.</em>
                            @endif
                        @else
                            <em>Hãy chọn bài kiểm tra mà bạn muốn xem.</em>
                        @endif
                    </div>
                </div>

            </div> <!-- End main content -->
        </div> <!-- ENd container -->
    </div> <!-- End Member area -->
    @stop
</main>