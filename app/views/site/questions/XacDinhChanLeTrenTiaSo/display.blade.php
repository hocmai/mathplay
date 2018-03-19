<?php
$min = !empty($config['min_value']) ? $config['min_value'] : rand(1,10);
$plus = !empty($config['number_plus']) ? $config['number_plus'] : rand(1,10);
$range = (!empty($config['number_count']) && $config['number_count'] >= 3) ? $config['number_count'] : rand(5, 10);
$lines = [];
for($i = 0; $i < $range; $i++){
	$lines[] = $min;
	$min += $plus;
}
$type = !empty($config['answer_type']) ? $config['answer_type'] : getRandArrayVal(['input','inline']);
$position = 0;
if($type == 'inline'){
	$position = array_rand($lines, 4);
	$answer = getRandArrayVal($lines);
	
 } else{

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