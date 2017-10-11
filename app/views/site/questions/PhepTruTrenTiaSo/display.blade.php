<?php
$min = isset($config['min_value']) ? $config['min_value'] : rand(0,10);
$plus = isset($config['number_plus']) ? $config['number_plus'] : rand(1,10);
$range = (!empty($config['number_count']) && $config['number_count'] >= 3) ? $config['number_count'] : rand(5, 10);
$lines = [];
for($i = 0; $i < $range; $i++){
	$lines[] = $min;
	$min += $plus;
}

$nums = getRandArrayVal($lines, 2);
$type = !empty($config['answer_type']) ? $config['answer_type'] : getRandArrayVal(['input', 'choose']);

if( $type == 'input' ){
	$answer = ($nums[1] - $nums[0]);
}
else if( $type == 'choose' ){
	$answer = $nums[1].'-'.($nums[1] - $nums[0]).'='.$nums[0];
	$num2 = getRandArrayVal($lines, 2);
	$num3 = getRandArrayVal($lines, 2);
	$num4 = getRandArrayVal($lines, 2);
	$answerArr = [
		$nums[1].' - '.($nums[1] - $nums[0]).' = '.$nums[0],
		$num2[1].' - '.($num2[1] - $num2[0]).' = '.$num2[0],
		$num3[1].' - '.($num3[1] - $num3[0]).' = '.$num3[0],
		$num4[1].' - '.($num4[1] - $num4[0]).' = '.$num4[0]
	];
	shuffle($answerArr);

	//// loai bo cac dap an bi trung
	$answerArr = array_unique($answerArr);
}

$position = rand(1, $range - 2);
?>

<div class="start">
	{{ $question->title }}
</div>
<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group number-line">
			<div class="content inline-block">
				@foreach($lines as $key => $value)
					<div class="line inline-block {{ ( $value >= $nums[0] && $value <= $nums[1] ) ? 'active'.( $value == $nums[0] ? ' first' : '' ).( $value == $nums[1] ? ' last' : '' ) : '' }}">
						{{ ( $value >= $nums[0] && $value < $nums[1] ) ? '<div class="sub">- '.$plus.'</div>' : '' }}
						{{ $value }}
					</div>
				@endforeach
			</div>
		</div>
		
		@if($type == 'input')
			<div class="form-group inline-block input" style="font-size:18px">
				{{ $nums[1].' - '.Form::text('answer', '', ['class' => 'form-control text-center', 'style' => 'width:55px;display:inline-block;font-size:18px']).' = '.$nums[0] }}
			</div>
		@elseif($type == 'choose')
			<div class="pull-left inline-block choose">
				@foreach( $answerArr as $key => $value )
					<div class="radio inline-block">
						{{ Form::radio('answer', str_replace(' ', '', $value), false, ['class' => '', 'id' => $question->id.'-'.$question_num.'-'.$key]) }}
						<label for="{{ $question->id.'-'.$question_num.'-'.$key }}">{{ $value }}</label>
					</div>
					<div class="clearfix"></div>
				@endforeach
			</div>
		@endif
	{{ Form::close() }}
</div>