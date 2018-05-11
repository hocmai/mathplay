<?php
$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['plus', 'sub']);
$max  = (!empty($config['max']) && $config['max'] > 10) ? $config['max'] : 100;
$max = floor($max/10);

if( $type == 'plus' ){
	$num1 = rand(1, $max)*10;
	$num2 = rand(1, $max)*10;
	$answer = $num1+$num2;
}
else{
	$num = getRandArrayVal(range(1, $max),2);
	$num1 = (int)$num[0]*10;
	$num2 = (int)$num[1]*10;
	if( $num1 < $num2 ){
		$num = $num1;
		$num1 = $num2;
		$num2 = $num1;
	}
	$answer = $num1-$num2;
}?>

@include('site.questions.render-title', ['question' => $question, 'str_arr' => [] ] )

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		{{ Form::hidden('answer') }}
		
		<div class="form-group">
			<div class="content inline-block text-center">
				<span style="font-size: 17px;font-weight: 500;">{{ ($type == 'plus') ? $num1.' + '.$num2 : $num1.' - '.$num2 }} =
				@for($i = strlen((string)$answer); $i >= 1; $i--)		
				 {{ Form::number('answer_', '', ['class'=> 'form-answer'.(($i == 1) ? ' virtual-focus' : ''), 'maxlength'=>1, 'tabindex' => $i, 'max' => 9, 'min' =>0 ]) }}
				@endfor
				</span>
			</div>
		</div>
	{{ Form::close() }}
</div>
@if( $type == 'plus' )
	@include('site.questions_guide.phepcong_nhieuso', ['a' => $num1, 'b' => $num2])
@else
	@include('site.questions_guide.pheptru_nhieuso', ['a' => $num1, 'b' => $num2])
@endif
	