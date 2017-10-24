<?php
$hour = array('01','02','03','04','05','06','07','08','09','10','11','12');
$minute = array('00','05','10','15','20','25','30','35','40','45','50','55');

$time1 = [getRandArrayVal($hour), getRandArrayVal($minute)];
$time2 = [getRandArrayVal($hour), getRandArrayVal($minute)];
$_arr = [$time1, $time2]; shuffle($_arr);

$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['hour','min','choose-number','choose-text','choose-img']);
$clock = !empty($config['clock']) ? $config['clock'] : getRandArrayVal(['analog','digital']);

?>
<div class="start">
	@if(!empty($config['sound_title']))
		<div class="play-question-sound">
			<button class="control play"></button>
			<video class="hidden">
				<source src="{{ $config['sound_title'] }}" type="" type="audio/mpeg">
			</video>
		</div>
	@endif
	{{ $question->title }}
</div>
<div class="description">
	
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $time1[0].':'.$time1[1] }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				@if( $clock == 'analog' )
					<div class="analog-clock">
						<div style="width: 250px; height: 250px">
							@include('site.common.analog-clock', ['hour' => (int)$time1[0], 'min' => (int)$time1[1] ])
						</div>
					</div>
				@else
					<div class="digital-clock">
						@include('site.common.digital-clock', ['hour' => $time1[0], 'min' => $time1[1] ])
					</div>
				@endif

				<div class="radio-box radio form-group">
					{{ Form::radio('answer', $_arr[0][0].':'.$_arr[0][1], false, ['id' => $question_num.'-1' ]) }}
					<label for="{{ $question_num.'-1' }}">{{ CommonQuestion::readHourMinute($_arr[0][0], $_arr[0][1]) }}</label>
				</div>
				<div class="radio-box radio form-group">
					{{ Form::radio('answer', $_arr[1][0].':'.$_arr[1][1], false, ['id'=>$question_num.'-2' ]) }}
					<label for="{{ $question_num.'-2' }}">{{ CommonQuestion::readHourMinute($_arr[1][0], $_arr[1][1]) }}</label>
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>