<?php
$min = !empty($config['min_value']) ? $config['min_value'] : 1;
$max = !empty($config['max_value']) ? $config['max_value'] : 99;
$answer = rand($min, $max);
$tens = floor($answer/10);
$ones = $answer - ($tens*10);

$shape = ['circle', 'pentagon', 'star', 'heptagon' ,'octagon'];
$rand_shape = array_rand($shape);
// dd($answer);
?>
<div class="start">
	{{ $question->title }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />

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
		<div class="form-group input">
			{{ Form::hidden('answer', '') }}
			<div class="pull-left">
				{{ Form::number('answer_1', '', ['class' => 'form-control pull-left inline-block', 'style' => 'width: 60px', 'min' => 0, 'max' => 9]) }}
				<strong class="pull-left" style="padding: 5px;font-size: 16px;">chục + </strong>
			</div>
			<div class="pull-left">
				{{ Form::number('answer_2', '', ['class' => 'form-control pull-left inline-block', 'style' => 'width: 60px', 'min' => 0, 'max' => 9]) }}
				<strong class="pull-left" style="padding: 5px;font-size: 16px;">đơn vị = {{ $answer }}</strong>
			</div>
		</div>
		
		<div class="clearfix"></div>
		<div class="form-group">
			<a href="javascript:void(0)" class="inline-block gui-bai closeModel hd-gui-bai-bt">Gửi bài</a>
		</div>
	{{ Form::close() }}
</div>

<style type="text/css">	.circle{border-radius: 100%; background: #8CC713}
	.star{
		-webkit-clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
	    clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
	    background: #ffca19;
	}
	.pentagon{
		-webkit-clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
		clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
	    background: yellow;
	}
	.heptagon{
		-webkit-clip-path: polygon(50% 0%, 90% 20%, 100% 60%, 75% 100%, 25% 100%, 0% 60%, 10% 20%);
		clip-path: polygon(50% 0%, 90% 20%, 100% 60%, 75% 100%, 25% 100%, 0% 60%, 10% 20%);
	    background: red;
	}
	.octagon{
		-webkit-clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
		clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
	    background: orange;
	}
</style>