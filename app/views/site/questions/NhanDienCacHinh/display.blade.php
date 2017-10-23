<?php
$answertype = !empty($config['answer_type']) ? $config['answer_type'] : 'rand';
if( $answertype == 'rand' ){
	$answertype = getRandArrayVal(['single', 'multi']);
}
$answertype = 'multi';
$shapes = NhanDienCacHinh::getShape();
$title = '';

if($answertype == 'single'){
	$title = 'Hình dưới đây là hình gì nhỉ?';
	$shapesList = array_rand($shapes, rand(3,5));
	$answer = getRandArrayVal($shapesList);
}
elseif($answertype == 'multi'){
	$shapesList1 = array_rand($shapes, 2);
	$shapesList2 = array_rand($shapes, 2);
	$shapesList = array_merge($shapesList1, $shapesList2);
	$answer = getRandArrayVal($shapesList);
	$title = 'Những hình nào dưới đây là '.$shapes[$answer];
 	// dd($shapesList, $answer);
}?>

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
<div class="description">{{ $title }}</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		@if($answertype == 'single')
			<div class="content inline-block {{ $answertype }}">
				<div class="shapes {{ $answer }}">
					<svg class="shape">{{ NhanDienCacHinh::renderShape($answer) }}</svg>
				</div>
				@foreach($shapesList as $key => $value)
					<div class="form-group inline-block radio-box">
						<input id="answer-{{ $question_num.'-'.$key }}" type="radio" name="answer" class="hidden" value="{{ $value }}">
						<label for="answer-{{ $question_num.'-'.$key }}">{{ $shapes[$value] }}</label>
					</div>
				@endforeach
			</div>
		@elseif($answertype == 'multi')
			<div class="content inline-block multi col-sm-8 col-sm-push-2">
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