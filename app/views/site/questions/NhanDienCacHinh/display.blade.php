<?php
$answertype = !empty($config['answer_type']) ? $config['answer_type'] : 'rand';

if( $answertype == 'rand' ){
	$answertype = getRandArrayVal(['single', 'multi']);
}

$shapes = NhanDienCacHinh::getShape();
$answer = !empty($config['shape']) ? $config['shape'] : array_rand($shapes);

$title = [$question->title];

if($answertype == 'single'){
	$title = ['Hình dưới đây là hình gì nhỉ?'];
	$shapesList = array_rand($shapes, rand(3,5));
}
elseif($answertype == 'multi'){
	$shapesList1 = array_rand($shapes, 2);
	$shapesList2 = array_rand($shapes, 2);
	$shapesList = array_merge($shapesList1, $shapesList2);
	$title = ['Hình nào dưới đây là', $shapes[$answer].'?' ];
}
if( !in_array($answer, $shapesList) ){
	$shapesList[0] = $answer;
}
shuffle($shapesList);
?>

@include('site.questions.render-title', ['question' => $question, 'str_arr' => $title])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		@if($answertype == 'single')
			<div class="content inline-block {{ $answertype }}">
				<div class="shapes {{ $answer }} form-group inline-block">
					{{ NhanDienCacHinh::renderShape($answer) }}
				</div>
				<div class="clear clearfix"></div>
				@foreach($shapesList as $key => $value)
					<div class="form-group inline-block radio-box">
						<input id="answer-{{ $question_num.'-'.$key }}" type="radio" name="answer" class="hidden" value="{{ $value }}">
						<label for="answer-{{ $question_num.'-'.$key }}">{{ $shapes[$value] }}</label>
					</div>
				@endforeach
			</div>
		@elseif($answertype == 'multi')
			<div class="content inline-block multi col-sm-10 col-sm-push-1 col-xs-12">
				@foreach($shapesList as $key => $value)
					<div class="col-sm-6">
						<div class="form-group inline-block radio-box check-multi">
							<input id="answer-{{ $question_num.'-'.$key }}" type="radio" name="answer" class="hidden" value="{{ $value }}">
							<label for="answer-{{ $question_num.'-'.$key }}">{{ NhanDienCacHinh::renderShape($value) }}</label>
						</div>
					</div>
				@endforeach
			</div>
		@endif
	{{ Form::close() }}
</div>