<?php
$min = !empty($config['min']) ? $config['min'] : 15;
$max = !empty($config['max']) ? $config['max'] : 100;
$num = !empty($config['num']) ? $config['num'] : rand(5,10);

$total = rand($min, $max);
$range1 = getRandArrayVal(range(1, $total-1), $num);
$range2 = [];

foreach ($range1 as $key => $value) {
	$range2[] = $total - $value;
}
shuffle($range2);

// dd($range1, $range2);


?>
@include('site.questions.render-title', ['question' => $question, 'desc' => 'Nối một số ở dòng trên với một số ở dòng dưới để có tổng bằng '.$total])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="1" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<input type="hidden" name="answer" value="0" />
		
		<div class="form-group">
			<div class="content inline-block">
				<canvas data-render='{{ json_encode(['range1' => $range1, 'range2' => $range2, 'total' => $total]) }}' class="graph-number-with-total" id="graph-number-with-total-{{ $question_num }}" width="650px" height="160px"></canvas>
				<button type="button" class="btn btn-default re-draw-canvas-graph">Vẽ lại</button>
			</div>
		</div>
	{{ Form::close() }}
</div>