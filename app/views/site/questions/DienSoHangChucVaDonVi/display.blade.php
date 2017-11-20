<?php
$min = !empty($config['min_value']) ? $config['min_value'] : 1;
$max = !empty($config['max_value']) ? $config['max_value'] : 999;
$answer = rand($min, $max);
$tens = floor($answer/10);
$ones = $answer - ($tens*10);
// dd($answer);

$shape = ['circle', 'pentagon', 'star', 'heptagon' ,'octagon'];
$rand_shape = array_rand($shape);
// dd($answer);
?>

@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		@if( $answer < 100 )
			<div class="form-group">
				@if($tens > 0)
					@for($i = 1; $i <= $tens; $i++)
						<table style="margin:5px 0; border:4px solid #ddd">
							<tr>
								@for($j = 1; $j <= 10; $j++)
								<td style="padding:5px;">
									<div class="{{ $shape[$rand_shape] }}" style="width:30px; height:30px"></div>
								</td>
								@endfor
							</tr>
						</table>
					@endfor
				@endif
				<div class="clearfix"></div>
				@if($ones > 0)
					<table>
						<tr>
							@for($i = 1; $i <= $ones; $i++)
								<td style="padding:5px">
									<div class="{{ $shape[$rand_shape] }}" style="width:30px; height:30px"></div>
								</td>
							@endfor
						</tr>
					</table>
				@endif
			</div>
		@endif
		<div class="form-group input inline-block">
			{{ Form::hidden('answer', '') }}
			<div class="pull-left">
				{{ Form::number('answer_1', '', ['class' => 'form-control pull-left inline-block', 'style' => 'width: 60px', 'min' => 0, 'max' => 9]) }}
				<strong class="pull-left" style="padding: 5px;font-size: 16px;">trăm + </strong>
			</div>
			<div class="pull-left">
				{{ Form::number('answer_2', '', ['class' => 'form-control pull-left inline-block', 'style' => 'width: 60px', 'min' => 0, 'max' => 9]) }}
				<strong class="pull-left" style="padding: 5px;font-size: 16px;">chục + </strong>
			</div>
			<div class="pull-left">
				{{ Form::number('answer_3', '', ['class' => 'form-control pull-left inline-block', 'style' => 'width: 60px', 'min' => 0, 'max' => 9]) }}
				<strong class="pull-left" style="padding: 5px;font-size: 16px;">đơn vị = {{ CommonQuestion::readNumber($answer) }}</strong>
			</div>
		</div>
	{{ Form::close() }}
</div>