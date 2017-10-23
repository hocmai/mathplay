<?php
$colors = [['Màu đỏ','red'], ['Màu cam','orange'], ['Màu xanh dương','blue'], ['Màu xanh lá cây','green'], ['Màu tím','purple'], ['Màu vàng','yellow'], ['Màu trắng','white']];
shuffle($colors);
$answer = array_rand($colors, rand(4,6));
?>

<div class="start">
	@if(!empty($config['sound_title']))
		<div class="play-question-sound">
			<button class="control play"></button>
			<video class="hidden">
				<source src="{{ $config['sound_title'] }}" type="" type="audio/mpeg">
			</video>
		</div>
	@endif
</div>
<div class="description">{{ 'Trong ô thứ '.($answer[3] + 1).' có màu gì?' }}</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $colors[$answer[3]][0] }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group find-color">
			<div class="content inline-block">
				@foreach( $colors as $key => $value )
					<div class="color-item" style="background: {{ $value[1] }}">{{ $key+1 }}</div>
				@endforeach
			</div>
		</div>

		<?php shuffle($answer); ?>
		@foreach( $answer as $key => $value )
				<div class="form-group find-color-answer">
				<input class="hidden" id="answer-{{ $question_num.$key }}" type="radio" name="answer" value="{{ $colors[$value][0] }}"/>
				<label for="answer-{{ $question_num.$key }}">
					{{ $colors[$value][0] }}
					<span class="color-hover" style="background: {{ $colors[$value][1] }}">{{ $colors[$value][0] }}</span>
				</label>
			</div>
		@endforeach
		
		<div class="clearfix"></div>
	{{ Form::close() }}
</div>