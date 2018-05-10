<?php
$display =!empty($config['display']) ? $config['display'] : getRandArrayVal(['ngang', 'doc']);
$min_a = !empty($config['min_a']) ? $config['min_a'] : 1;
$max_a = !empty($config['max_a']) ? $config['max_a'] : 99999;
$min_b = !empty($config['min_b']) ? $config['min_b'] : 1;
$max_b = !empty($config['max_b']) ? $config['max_b'] : 9;

$a = rand($min_a, $max_a);
$b = rand($min_b, $max_b);
$answer =floor($a/$b);

?>
@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		{{ Form::hidden('answer') }}
		
		<div class="form-group">
			<div class="content inline-block">
				@if($display == 'doc')
				<div class="text-right" style="width:90px;line-height:25px;font-weight:400;letter-spacing:1px;">
					<span class="number-a clearfix">
						<span style="display: table-cell;width: 19px;text-align: right;">{{ $a }}</span>
					</span>
					<span class="number-b clearfix">
						<span class="pull-left">:</span>
						<span style="display: table-cell;width: 19px;text-align: right;">{{ $b }}</span>
					</span>
					<hr style="margin: 5px 0">
					<span class="number-c">
						<div class="multi-input-number">
							{{ Form::text('answer', '', ['style'=>'text-align:right;width:100%;height:25px;letter-spacing: 1px;', 'maxlength'=>7]) }}
						</div>
					</span>
				</div>
				@else
					<span class="number">{{ $a.' : '.$b.' = ' }}</span>
					<span class="number-c">
						{{ Form::text('answer', '',['style'=> 'width:80px;height:25px;','maxlength'=>7]) }}
					</span>
				@endif
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.phep_chia_2_so_co_du')
