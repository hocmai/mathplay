<?php
$range = (!empty($config['number_count']) && $config['number_count'] >= 3) ? $config['number_count'] : rand(5, 10);
$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['input', 'choose']);

$lines = [];
for($i = 1; $i < $range; $i++){
	$lines[] = $i;
}

if($type == 'input'){
	$str = ['Chọn các số lẻ ở trên tia số?'];
}else {
	$str = ['Chọn các số chẵn ở trên tia số?'];
}
?>

@include('site.questions.render-title', ['question' => $question, 'str' => $str])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="  " />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<input type="hidden" name="answer" />
		
		<div class="form-group number-line">
			<div class="content inline-block">
				@foreach($lines as $key => $value)
					<div class="line inline-block" >
						{{ Form::checkbox('answer_number') }}
						<label>{{ $value }}</label>
					</div>
				@endforeach
			</div>
		</div>
	{{ Form::close() }}
</div>