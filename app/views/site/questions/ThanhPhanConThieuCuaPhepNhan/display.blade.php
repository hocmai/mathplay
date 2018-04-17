<?php 
$min_a = !empty($config['min_a']) ? $config['min_a'] : 1;
$max_a = !empty($config['max_a']) ? $config['max_a'] : 100;
$min_b = !empty($config['min_b']) ? $config['min_b'] : 1;
$max_b = !empty($config['max_b']) ? $config['max_b'] : 100;
$a = rand($min_a, $max_a);
$b = rand($min_b, $max_b);
$answer = $b;

?>
@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="content inline-block">
					@if( $a > $b )
						<div class="nhan pull-left" style="font-size: 18px;">{{ Form::number('answer', '', ['style' => 'width: 50px;text-align: center;']) }} x {{ $a }} = {{ $a*$b }}</div>
					@else
						<div class="nhan pull-left" style="font-size: 18px;">{{ $a }} x {{ Form::number('answer', '', ['style' => 'width: 50px;text-align: center;']) }} = {{ $a*$b }}</div>
					@endif
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.thanh_phan_con_thieu_cua_phep_nhan')