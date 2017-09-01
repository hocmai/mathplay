<?php
	$answer = rand(3,10);
	$answertype = ['input', 'choose'];
	$answertype = $answertype[array_rand($answertype)];
?>
<div class="start">
	{{ $question->title }}
</div>

<div class="container-fluid">
	{{ Form::open(['method' => 'GET', 'class' => '']) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<div class="content form-group">
			<table class="frame">
				<tr>
					@for($i = 1; $i <= 5; $i++)
						<td style="border: 5px solid #bee8fb; padding: 10px">
							<div class="cirle-{{ ($i <= $answer) ? 'available' : 'none' }}"></div>
						</td>
					@endfor
				</tr>
				<tr>
					@for($i = 6; $i <= 10; $i++)
						<td style="border: 5px solid #bee8fb; padding: 10px">
							<div class="cirle-{{ ($i <= $answer) ? 'available' : 'none' }}"></div>
						</td>
					@endfor
				</tr>
			</table>
		</div>

		@if($answertype == 'input')
			<div class="form-group col-sm-2">
				{{ Form::number('answer', '', ['class' => 'form-control', 'required' => true]) }}
			</div>
		@else
			<table class="form-group" cellspacing="5" cellpadding="5">
				<tr>
					@for($i = 1; $i <= 5; $i++)
						<td>
							<label for="answer-{{ $i }}">
								{{ $i }}
							</label>
							<input class="hidden" id="answer-{{ $i }}" type="radio" name="answer" value="{{ $i }}"/>
						</td>
					@endfor
				</tr>
				<tr>
					@for($i = 6; $i <= 10; $i++)
						<td>
							<label for="answer-{{ $i }}">
								{{ $i }}
							</label>
							<input class="hidden" id="answer-{{ $i }}" type="radio" name="answer" value="{{ $i }}"/>
						</td>
					@endfor
				</tr>
			</table>
		@endif

		<div class="clearfix"></div>
		<div class="form-group">
			<button class="gui-bai closeModel hd-gui-bai-bt">Gửi bài</button>
		</div>
	{{ Form::close() }}
</div>

<style type="text/css">
	.cirle-none{width: 50px; height: 50px;}
	.cirle-available{width: 50px; height: 50px; border-radius: 100%; background: #8CC713}
</style>