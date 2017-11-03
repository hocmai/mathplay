<?php
$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['plus', 'sub']);
$max  = !empty($config['max']) ? $config['max'] : 100;
$max = floor($max/10);

if( $type == 'plus' ){
	$num1 = rand(1, $max)*10;
	$num2 = rand(1, $max)*10;
	$answer = $num1+$num2;
}
else{
	$num = getRandArrayVal(range(1, $max),2);
	$num1 = $num[1]*10;
	$num2 = $num[0]*10;
	$answer = $num1-$num2;
}?>

@include('site.questions.render-title', ['question' => $question, 'str_arr' => [] ] )

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block text-center">
				<span style="font-size: 17px;font-weight: 500;">{{ ($type == 'plus') ? $num1.' + '.$num2 : $num1.' - '.$num2 }} = {{ Form::text('answer', '', ['style'=>'width: 45px;text-align: center']) }}</span>
			</div>
		</div>
	{{ Form::close() }}
</div>