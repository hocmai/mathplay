<?php
	$answer = rand(3,10);
	$answertype = ['input', 'choose'];
	$answertype = $answertype[array_rand($answertype)];

	$shape = ['circle', 'pentagon', 'star', 'heptagon' ,'octagon'];
	$rand_shape = array_rand($shape);
?>
<div class="start">
	{{ $question->title }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form '.$answertype, 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<div class="content form-group">
			<table class="frame">
				<tr>
					@for($i = 1; $i <= 5; $i++)
						<td style="border: 5px solid #bee8fb; padding: 10px">
							<div class="{{ ($i <= $answer) ? $shape[$rand_shape] : 'shape-none' }}"></div>
						</td>
					@endfor
				</tr>
				<tr>
					@for($i = 6; $i <= 10; $i++)
						<td style="border: 5px solid #bee8fb; padding: 10px">
							<div class="{{ ($i <= $answer) ? $shape[$rand_shape] : 'shape-none' }}"></div>
						</td>
					@endfor
				</tr>
			</table>
		</div>

		@if($answertype == 'input')
			<div class="form-group col-sm-2 input">
				{{ Form::number('answer', '', ['class' => 'form-control', 'required' => true]) }}
			</div>
		@else
			<table class="form-group choose" cellspacing="5" cellpadding="5">
				<tr>
					@for($i = 1; $i <= 5; $i++)
						<td>
							<input class="hidden" id="answer-{{ $question_num.$i }}" type="radio" name="answer" value="{{ $i }}"/>
							<label for="answer-{{ $question_num.$i }}">
								{{ $i }}
							</label>
						</td>
					@endfor
				</tr>
				<tr>
					@for($i = 6; $i <= 10; $i++)
						<td>
							<input class="hidden" id="answer-{{ $question_num.$i }}" type="radio" name="answer" value="{{ $i }}"/>
							<label for="answer-{{ $question_num.$i }}">
								{{ $i }}
							</label>
						</td>
					@endfor
				</tr>
			</table>
		@endif

		<div class="clearfix"></div>
		<div class="form-group">
			<a href="javascript:void(0)" class="inline-block gui-bai closeModel hd-gui-bai-bt">Gửi bài</a>
		</div>
	{{ Form::close() }}
</div>

<style type="text/css">
	td > div{
	    width: 50px;
	    height: 50px;
	}
	.shape-none{width: 50px; height: 50px;}
	.circle{border-radius: 100%; background: #8CC713}
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
	.question-wrapper .choose td>label{
		width: 64px;
	    height: 64px;
	    text-align: center;
	    line-height: 45px;
	    margin: 5px;
	    font-size: 30px;
	    background: #6a8bf3;
	}
	.question-wrapper .choose td>input:checked + label,
	.question-wrapper .choose td>label:hover{
		background: #32437c;
	}
</style>