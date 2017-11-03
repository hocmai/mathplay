<?php
$min = !empty($config['min_value']) ? $config['min_value'] : 0;
$max = !empty($config['max_value']) ? $config['max_value'] : 5;
$num_count = !empty($config['number_count']) ? $config['number_count'] : rand(2,4);
$range = range($min, $max);
if( $num_count > count($range) ){
	$num_count = count($range);
}
$answer = array_rand($range, $num_count);

$images = Cong2HinhAnh::getRandomData();
$images = $images[array_rand($images)];
// dd($images);
?>

@include('site.questions.render-title', ['question' => $question, 'str_arr' => [] ] )

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ array_sum($answer) }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group plus-with-img">
			<div class="content inline-block">
				@foreach( $answer as $key => $value )
					<div class="so-hang pull-left">
						<div class="img">
							{{ ($value == 0) ? '<div class="item none"></div>' : '' }}
							@for($j = 1; $j <= $value; $j++)
								<div class="item"><img src="{{ $images }}" width="50"></div>
							@endfor
						</div>
						<span class="number">{{ $value }}</span>
					</div>
					@if( $key < count($answer) - 1 )
						<div class="pull-left plus">+</div>
					@endif
				@endforeach

				<div class="pull-left plus">=</div>
				<div class="tong pull-left">{{ Form::text('answer') }}</div>
			</div>
		</div>
	{{ Form::close() }}
</div>