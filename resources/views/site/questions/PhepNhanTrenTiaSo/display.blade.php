<?php
$plus = !empty($config['number_plus']) ? $config['number_plus'] : rand(1,10);
$range = (!empty($config['number_count']) && $config['number_count'] >= 3) ? $config['number_count'] : rand(5, 10);
$lines = [];
for($i = 0; $i < $range; $i++){
	$lines[] = $plus*$i;
}
$position = rand(1, $range - 1);
?>

@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $plus }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group number-line">
			<div class="content inline-block">
				@foreach($lines as $key => $value)
					<div class="line inline-block {{ ( $key <= $position ) ? 'active'.( ($key < $position) ? ' first' : '' ) : '' }}">
						{{ ( $key < $position ) ? '<div class="sub">x '.($key+1).'</div>' : '' }}
						{{ $value }}
					</div>
				@endforeach
			</div>
		</div>
		<div class="form-group inline-block" style="font-size:18px">
			{{ $position.' x '.Form::text('answer', '', ['class' => 'form-control inline-block text-center', 'style' => 'width:50px']).' = '.$position*$plus }}
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.phep_nhan_tren_tia_so')