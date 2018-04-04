<?php
$min_a = !empty($config['min_a']) ? $config['min_a'] : 1;
$max_a = !empty($config['max_a']) ? $config['max_a'] : 10;
$min_b = !empty($config['min_b']) ? $config['min_b'] : 1;
$max_b = !empty($config['max_b']) ? $config['max_b'] : 10;
$min_c = !empty($config['min_c']) ? $config['min_c'] : 1;
$max_c = !empty($config['max_c']) ? $config['max_c'] : 10;
$display = !empty($config['display']) ? $config['display'] : getRandArrayVal(['ngang', 'doc']);

$a = rand($min_a,$max_a);
$b = rand($min_b, $max_b);
$c = rand($min_c, $max_c);

?>
@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $a*$b*$c }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="nhan pull-left {{$display }}">
					@if($display == 'ngang')
						<span class="num1">{{ $a }}</span><span class="num2"><span class="human"> x </span>{{ $b }}</span><span class="human"> x </span><span class="num3">{{ $c }}</span><span class="result"> = {{ Form::text('answer','',(['style' => 'width:40px']))}}</span>
					@else
						<span class="num1">{{ $a }}</span><br>
						<span class="human"> x </span> <span class="num1">{{ $b }}</span><br>
						<span class="human"> x </span> <span class="num1">{{ $c }}</span><hr>
						<span class="result"> = {{ Form::text('answer','',(['style' => 'width:40px']))}}</span>
					@endif
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.phep_nhan_ba_So_hang')
