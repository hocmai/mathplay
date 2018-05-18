<?php
$min2 = isset($config['min_value_2']) ? $config['min_value_2'] : 0;
$max2 = isset($config['max_value_2']) ? $config['max_value_2'] : 10;

$min1 = (isset($config['min_value_1']) && $config['min_value_1'] >= $max2) ? $config['min_value_1'] : $max2;
$max1 = isset($config['max_value_1']) ? $config['max_value_1'] : 10;

$answer2 = rand($min2, $max2);
$answer1 = rand($min1, $max1);
$display = !empty($config['display']) ? $config['display'] : getRandArrayVal(['ngang', 'doc']);
$find = !empty($config['find']) ? $config['find'] : getRandArrayVal(['hieu', 'a', 'b']);

$answer = $answer1 - $answer2;
if( $find == 'a' ){
	$answer = $answer1;
}
else if( $find == 'b' ){
	$answer = $answer2;
}
?>

@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		{{ Form::hidden('answer') }}

		<div class="form-group plus-with-0">
			<div class="content inline-block">
				<div class="tong pull-left {{ $display }}" style="font-size: 18px;">
					@if($find == 'a')
						@for($i = strlen($answer); $i >= 1; $i--)
							<span class="num1 inline-block">{{ Form::number('answer_', '', ['class'=> 'form-answer'.(($i == 1) ? ' virtual-focus' : ''), 'max'=>'9','min' => '0' , 'tabindex' => $i]) }}</span>
						@endfor
					@else
						<span class="num1">{{ $answer1 }}</span>
					@endif
					<span class="num2"><span class="plus"> - </span>
						@if($find == 'b')
							@for($i = strlen($answer); $i >= 1; $i--)
								<span class="num1 inline-block">{{ Form::number('answer_', '', ['class'=> 'form-answer'.(($i == 1) ? ' virtual-focus' : ''), 'max'=>'9','min' => '0' , 'tabindex' => $i]) }}</span>
							@endfor
						@else
							<span class="num1">{{ $answer2 }}</span>
						@endif
					</span>
					<span class="result"> =
					 	@if($find == 'hieu')
							@for($i = strlen($answer); $i >= 1; $i--)
								<span class="num1 inline-block">{{ Form::number('answer_', '', ['class'=> 'form-answer'.(($i == 1) ? ' virtual-focus' : ''), 'max'=>'9','min' => '0' , 'tabindex' => $i]) }}</span>
							@endfor
						@else
							<span class="num1">{{ $answer1-$answer2}}</span>
						@endif
					</span>
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.pheptru_nhieuso', [
	'a' => $answer1,
	'b' => $answer2
])