<?php
$min_a = (isset($config['min_a']) && is_numeric($config['min_a'])) ? $config['min_a'] : 1;
$max_a = (isset($config['max_a']) && is_numeric($config['max_a'])) ? $config['max_a'] : 999999;
$min_b = (isset($config['min_b']) && is_numeric($config['min_b'])) ? $config['min_b'] : 1;
$max_b = (isset($config['max_b']) && is_numeric($config['max_b'])) ? $config['max_b'] : 999999;

$a = rand($min_a, $max_a);
$b = rand($min_b, $max_b);
?>
@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $a*$b }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		{{ Form::hidden('answer' ) }}
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="text-right" >
					<span class="number-a clearfix">
						<span>{{ $a }}</span>
					</span>
					<span class="number-b clearfix">
						<span class="pull-left">x</span>
						<span>{{ $b }}</span>
					</span>
					<hr style="margin: 5px 0">
					<span class="number-c">
						@for($i = strlen((string)$a*$b); $i >= 1; $i--)
							<div class="multi-input-number inline-block">
								{{ Form::number('answer_', '', ['class'=> 'form-answer'.(($i == 1) ? ' virtual-focus' : ''), 'maxlength'=>1, 'tabindex' => $i, 'max' => 9, 'min' =>0 ]) }}
							</div>
						@endfor
					</span>
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.phepnhan_motso')
