<?php
$answertype = !empty($config['type']) ? $config['type'] : getRandArrayVal(['cạnh', 'đỉnh']);
$shapes = DemCanhDaGiac::getShape();

$answer = array_rand($shapes);
$num = ($answer == 'tam-giac') ? 3 : 4;
?>

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

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $num }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="content inline-block">
			<div class="shapes {{ $answer }}">
				<svg class="shape" width="200" height="200">{{ DemCanhDaGiac::renderShape($answer) }}</svg>
			</div>
			<div class="form-group">
				{{ Form::text('answer', '', ['class' => 'form-control', 'style' => 'width:100px;float:left']) }}
				<span style="vertical-align: bottom;
    display: inline-block;
    line-height: 35px;
    font-size: 18px;">{{ $answertype }}</span>
			</div>
		</div>
	{{ Form::close() }}
</div>