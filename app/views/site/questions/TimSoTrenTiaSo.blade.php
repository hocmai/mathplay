<?php
$min = !empty($config['min_value']) ? $config['min_value'] : rand(1,10);
$plus = !empty($config['number_plus']) ? $config['number_plus'] : rand(1,10);
$range = rand(5, 10);
$lines = [];
for($i = 0; $i < $range; $i++){
	$lines[] = $min;
	$min += $plus;
}

$type = array('inline', 'input');
shuffle($type);

if($type == 'inline'){
	$answer = $lines[array_rand($lines)];
} else{
	$position = array_rand($lines);
	$answer = $lines[$position];
	$target = array_rand( array_except($lines, $position) );
}


?>

<div class="start">
	{{ ($type[0] == 'inline') ? 'Điền số còn thiếu trong tia số' : '' }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group number-line">
			<div class="content inline-block">
				@foreach($lines as $value)
					<div class="line inline-block">
						{{ ($value == $answer && $type[0] == 'inline') ? Form::text('answer', '', ['class' => 'form-control padding0 text-center']) : $value }}
					</div>
				@endforeach
			</div>
		</div>
		
		@if($type[0] == 'input')
			<div class="form-group inline-block">
				<div class="col-sm-12">
					{{ Form::number('answer', '', ['class' => 'form-control', 'required' => true]) }}
				</div>
			</div>
		@endif
		
		<div class="clearfix"></div>
		<div class="form-group">
			<a href="javascript:void(0)" class="inline-block gui-bai closeModel hd-gui-bai-bt">Gửi bài</a>
		</div>
	{{ Form::close() }}
</div>