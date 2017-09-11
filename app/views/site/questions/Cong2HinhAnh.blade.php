<?php
$min = !empty($config['min_value']) ? $config['min_value'] : 0;
$max = !empty($config['max_value']) ? $config['max_value'] : 5;
$answer = array_rand(range($min, $max), 2);
$images = Cong2HinhAnh::getRandomData();
$images = $images[array_rand($images)];
// dd($images);
?>

<div class="start">
	{{ $question->title }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer[0] + $answer[1] }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group plus-with-img">
			<div class="content inline-block">
				<div class="so-hang pull-left">
					<div class="img">
						{{ ($answer[0] == 0) ? '<div class="item none"></div>' : '' }}
						@for($i = 1; $i <= $answer[0]; $i++)
							<div class="item"><img src="{{ $images }}" height="50"></div>
						@endfor
					</div>
					<span class="number">{{ $answer[0] }}</span>
				</div>
				<div class="pull-left plus">+</div>
				<div class="so-hang pull-left">
					<div class="img">
						{{ ($answer[1] == 0) ? '<div class="item none"></div>' : '' }}
						@for($i = 1; $i <= $answer[1]; $i++)
							<div class="item"><img src="{{ $images }}" height="50"></div>
						@endfor
					</div>
					<span class="number">{{ $answer[1] }}</span>
				</div>
				<div class="pull-left plus">=</div>
				<div class="tong pull-left">{{ Form::text('answer') }}</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
		<div class="form-group">
			<a href="javascript:void(0)" class="inline-block gui-bai closeModel hd-gui-bai-bt">Gửi bài</a>
		</div>
	{{ Form::close() }}
</div>