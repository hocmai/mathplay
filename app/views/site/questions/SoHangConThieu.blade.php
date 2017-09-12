<?php
$min = !empty($config['min_value']) ? $config['min_value'] : 1;
$max = !empty($config['max_value']) ? $config['max_value'] : 10;
$answer1 = rand($min, $max);
$answer2 = rand($min, $max);
// dd($images);
?>

<div class="start">
	{{ $question->title }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer2 }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group plus-with-0">
			<div class="content inline-block">
				@if( $answer1 > $answer2 )
					<div class="tong pull-left" style="font-size: 18px;">{{ Form::number('answer', '', ['style' => 'width: 50px;text-align: center;']) }} + {{ $answer1 }} = {{ $answer1 + $answer2 }}</div>
				@else
					<div class="tong pull-left" style="font-size: 18px;">{{ $answer1 }} + {{ Form::number('answer', '', ['style' => 'width: 50px;text-align: center;']) }} = {{ $answer1 + $answer2 }}</div>
				@endif
			</div>
		</div>
		
		<div class="clearfix"></div>
		<div class="form-group">
			<a href="javascript:void(0)" class="inline-block gui-bai closeModel hd-gui-bai-bt">Gửi bài</a>
		</div>
	{{ Form::close() }}
</div>