<?php 
$hour = array('05','06','07','08','09','10');
$minute = array('00','05','10','15','20','25','30','35','40','45','50','55');
$randClock = rand(1,4);
$do_this = getRandArrayVal(['trước','sau']);
$name = getRandArrayVal(['Tân','Tùng','Tiến','Mai','Lan','Hồng','Thủy','Hà','An']);
$works = getRandArrayVal(['Đi đá bóng', 'Làm bài tập', 'Viết thư cho bà', 'Làm bánh', 'Quét nhà', 'Đi xem phim', 'Đi câu cá'], 2);

$time1 = [getRandArrayVal($hour), getRandArrayVal($minute)];
$time2 = [getRandArrayVal($hour), getRandArrayVal($minute)];
if( ((strtotime($time1[0].':'.$time1[1].':00') < strtotime($time2[0].':'.$time2[1].':00')) && $do_this == 'sau')
	| ((strtotime($time1[0].':'.$time1[1].':00') > strtotime($time2[0].':'.$time2[1].':00')) && $do_this == 'trước') ){
	$answer = 2;
}else{
	$answer = 1;
}?>
@include('site.questions.render-title', ['question' => $question, 'desc' => $name.' đặt hẹn giờ cho hai chiếc đồng hồ từ '.getRandArrayVal(['sáng','chiều']).' '.getRandArrayVal(['hôm qua', 'nay', 'ngày mai', 'ngày kia']).'.'])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="clock-wrapper">
					<div class="pull-left text-center">
						@include('site.common.digital-clock', ['hour' => $time1[0], 'min' => $time1[1], 'num' => $randClock ])
						<p>{{ $works[0] }}</p>
					</div>
					<div class="pull-left text-center">
						@include('site.common.digital-clock', ['hour' => $time2[0], 'min' => $time2[1], 'num' => $randClock ])
						<p>{{ $works[1] }}</p>
					</div>
				</div>

				<div class="description margin0"><p>{{ $name.' làm việc gì '.$do_this.'?' }}</p></div>

				<div class="form-group radio radio-box">
					{{ Form::radio('answer', 1, false, ['id' => 'select-clock-1-'.$question_num]) }}
					<label for="{{ 'select-clock-1-'.$question_num }}">
						{{ $works[0] }}
					</label>
				</div>
				<div class="form-group radio radio-box">
					{{ Form::radio('answer', 2, false, ['id' => 'select-clock-2-'.$question_num]) }}
					<label for="{{ 'select-clock-2-'.$question_num }}">
						{{ $works[1] }}
					</label>
				</div>
				
			</div>
		</div>
	{{ Form::close() }}
</div>