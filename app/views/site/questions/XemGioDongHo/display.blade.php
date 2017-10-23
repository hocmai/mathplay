<?php
$hour = array('01','02','03','04','05','06','07','08','09',10,11,12);
$minute = array('00','05','10','15','20','25','30','35','40','45','50','55');

$time1 = [getRandArrayVal($hour), getRandArrayVal($minute)];
$time2 = [getRandArrayVal($hour), getRandArrayVal($minute)];
// $answer = [$time1, [getRandArrayVal($hour), getRandArrayVal($minute)]];
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
				<div class="clock">
					<img src="{{ asset('questions/XemGioDongHo/img/clock.svg') }}" width="250px" height="250px">
					<div class="center-point"></div>
					<div class="hour-line" style="transform: rotate({{ ((int)($time1[0])*30)-90+( ( ((int)$time1[1]/60)*100*30 )/100) }}deg);"></div>
					<div class="min-line" style="transform: rotate({{ ((int)(($time1[1])/5)*30)-90 }}deg);"></div>
				</div>

				<?php $_arr = [$time1, $time2]; shuffle($_arr); ?>
				<div class="radio-box radio form-group">
					{{ Form::radio('answer', $_arr[0][0].':'.$_arr[0][1], false, ['id' => $question_num.'-1' ]) }}
					<label for="{{ $question_num.'-1' }}">{{ $_arr[0][0].':'.$_arr[0][1] }}</label>
				</div>
				<div class="radio-box radio form-group">
					{{ Form::radio('answer', $_arr[1][0].':'.$_arr[1][1], false, ['id'=>$question_num.'-2' ]) }}
					<label for="{{ $question_num.'-2' }}">{{ $_arr[1][0].':'.$_arr[1][1] }}</label>
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>