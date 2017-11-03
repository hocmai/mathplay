<?php
$min = (isset($config['min_value']) && $config['min_value'] > 1) ? $config['min_value'] : 2;
$max = isset($config['max_value']) ? $config['max_value'] : 5;
$max = (($max - $min) < 3) ? $min + 3 : $max;
$range = range($min, $max);
$answer_range = getRandArrayVal($range, 4);

$answer_rand = [];
foreach ($answer_range as $key => $value) {
	$num1 = rand(1, $value-1);
	$answer_rand[] = [ $num1, $value-$num1 ];
}
// dd($answer_rand, $answer_range);
// $answer_rand = [ array_rand($range, 2), array_rand($range, 2), array_rand($range, 2), array_rand($range, 2) ];

$type = [ '_H_' => ['blue', 'orange', 'pink', 'purple'], '_piece_' => ['green', 'pink', 'purple', 'yellow'], '_piece2_' => ['green', 'purple', 'red', 'yellow'] ];

$type_answer = ['trac-nghiem', 'dien-dap-an'];
$type_answer = !empty($config['answer_type']) ? $config['answer_type'] : $type_answer[array_rand($type_answer)];

shuffle($answer_rand);
?>

@include('site.questions.render-title', ['question' => $question])

<div class="description">
	@if($type_answer == 'trac-nghiem')
		Hình ảnh nào dưới đây đúng với biểu thức {{ $answer_rand[0][0]." + ".$answer_rand[0][1].' = '.($answer_rand[0][0] + $answer_rand[0][1]) }}
	@else
		Viết biểu thức tương ứng với hình ảnh bên dưới (Ví dụ: 1 + 1 = 2)
	@endif
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer_rand[0][0]."+".$answer_rand[0][1].'='.($answer_rand[0][0] + $answer_rand[0][1]) }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		@if($type_answer == 'trac-nghiem')
			<div class="form-group plus-with-puzzle text-left">
				<?php shuffle($answer_rand) ?>
				@foreach( $answer_rand as $key => $answer )
					<div class="form-group">
						<div class="radio">
							<input type="radio" value="{{ $answer[0].'+'.$answer[1].'='.($answer[0] + $answer[1]) }}" name="answer" id="answer-{{ $question_num.'-'.$key }}">
							<?php
								$type_rand = array_rand($type);
								$images = array_rand($type[$type_rand], 2);
							?>
							<label class="{{ $type_rand }}" for="answer-{{ $question_num.'-'.$key }}">
								@for( $i = 1; $i <= ($answer[0] + $answer[1]); $i++ )
									@if( $i <= $answer[0] )
										<img src="{{ asset('questions/DienBieuThuc/img/puzzle'.$type_rand.$type[$type_rand][$images[0]].'.png') }}" class="{{ ($type_rand == '_H_' && $i%2 == 0) ? 'rotate' : '' }}" width="50">
									@else
										<img src="{{ asset('questions/DienBieuThuc/img/puzzle'.$type_rand.$type[$type_rand][$images[1]].'.png') }}" class="{{ ($type_rand == '_H_' && $i%2 == 0) ? 'rotate' : '' }}" width="50">
									@endif
								@endfor
							</label>
						</div>
					</div>
				@endforeach
			</div>
		@else
			<div class="form-group plus-with-puzzle text-center">
				<div class="form-group">
					<div class="preview">
						<?php
							$type_rand = array_rand($type);
							$images = array_rand($type[$type_rand], 2);
						?>
						<div class="{{ $type_rand }} item">
							@for( $i = 1; $i <= ($answer_rand[0][0] + $answer_rand[0][1]); $i++ )
								@if( $i <= $answer_rand[0][0] )
									<img src="{{ asset('questions/DienBieuThuc/img/puzzle'.$type_rand.$type[$type_rand][$images[0]].'.png') }}" class="{{ ($type_rand == '_H_' && $i%2 == 0) ? 'rotate' : '' }}" width="50">
								@else
									<img src="{{ asset('questions/DienBieuThuc/img/puzzle'.$type_rand.$type[$type_rand][$images[1]].'.png') }}" class="{{ ($type_rand == '_H_' && $i%2 == 0) ? 'rotate' : '' }}" width="50">
								@endif
							@endfor
						</div>
					</div>
				</div>
			</div>
			<div class="form-group inline-block">
				{{ Form::text('answer', '', ['class' => 'form-control']) }}
			</div>
		@endif
	{{ Form::close() }}
</div>